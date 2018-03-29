<?php
/*
 * You may not change or alter any portion of this comment or credits
 * of supporting developers from this source code or any supporting source code
 * which is considered copyrighted (c) material of the original comment or credit authors.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.
 */

/**
 * @copyright    {@link https://xoops.org/ XOOPS Project}
 * @license      {@link http://www.gnu.org/licenses/gpl-2.0.html GNU GPL 2 or later}
 * @package       tdmstats
 * @since
 * @author       TDM   - TEAM DEV MODULE FOR XOOPS
 * @author       XOOPS Development Team
 */

class GphpChart
{
    public $chart;
    public $chart_url;
    public $legend_params        = false;
    public $world_params         = false;
    public $base_url             = 'http://chart.apis.google.com/chart?';
    public $width                = 300;
    public $height               = 200;
    public $types                = ['lc', 'lxy', 'bhs', 'bvs', 'bhg', 'bvg', 'p', 'p3', 'v', 's', 't'];
    public $chart_types          = [
        'l' => 'line',
        'b' => 'bar',
        'p' => 'pie',
        'v' => 'venn',
        's' => 'scatter',
        't' => 'world'
    ];
    public $mandatory_parameters = ['chs', 'chd', 'cht'];
    public $data_prepared        = false;
    public $allowed_parameters   = [
        'l' => ['chtt', 'chdl', 'chco', 'chf', 'chxt', 'chg', 'chm', 'chls', 'chxp'],
        'b' => ['chtt', 'chbh', 'chdl', 'chco', 'chf', 'chxt', 'chxp', 'chm'],
        'p' => ['chtt', 'chco', 'chf', 'chl', 'chdl'],
        'v' => ['chtt', 'chdl', 'chco', 'chf'],
        's' => ['chtt', 'chdl', 'chco', 'chf', 'chxt', 'chg', 'chm', 'chxp'],
        't' => ['chtt', 'chco', 'chl', 'chld', 'chtm'],
    ];
    public $range                = 1;
    public $encodings            = [
        's' => ['sep' => '', 'set' => ',', 'range' => 61, 'missing' => '_'],
        't' => ['sep' => ',', 'set' => '|', 'range' => 100, 'missing' => -1],
        'e' => ['sep' => '', 'set' => ',', 'range' => 4096, 'missing' => '__'],
    ];
    public $simple_encoding      = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789';
    // min and max values of horizontal axis
    public $max_xt = 0;
    public $min_xt = 100000; // fake value to be sure we got the min data value
    // min and max values for vertical axis
    public $max_yr   = 0;
    public $min_yr   = 100000; // fake value to be sure we got the min data value
    public $ratio    = false;
    public $cached   = true;
    public $prepared = false;

    /**
     * @param string $type
     * @param string $encoding
     *
     */
    public function __construct($type = 'lc', $encoding = 't')
    {
        $this->chart = (object)null;
        // $chart = new stdClass();

        if (!in_array($type, $this->types)) {
            return false;
        } else {
            $this->chart->cht = $type;
        }
        $this->chart_type = $this->chart_types[substr($this->chart->cht, 0, 1)];

        if (!in_array($encoding, array_keys($this->encodings))) {
            return false;
        } else {
            $this->encoding = $encoding;
        }

        $this->sep     = $this->encodings[$this->encoding]['sep'];
        $this->range   = $this->encodings[$this->encoding]['range'];
        $this->missing = $this->encodings[$this->encoding]['missing'];
        $this->set     = $this->encodings[$this->encoding]['set']; // set separator
        if ('venn' === $this->chart_type) {
            $this->set = ',';
        }

        $string = $this->simple_encoding;
        unset($this->simple_encoding);
        for ($i = 0, $iMax = strlen($string); $i < $iMax; ++$i) {
            $this->simple_encoding[] = $string[$i];
        }

        $this->extended_encoding   = $this->simple_encoding;
        $this->extended_encoding[] = '-';
        $this->extended_encoding[] = '.';
        $this->extended_encoding[] = '_';
        $this->extended_encoding[] = ',';
    }

    /* PRE GENERATION : add labels, data, axis, etc */

    /**
     * @param        $values
     * @param string $color
     */
    public function add_data($values, $color = '')
    {
        $this->cached      = false;
        $this->chart->chco = $color;
        $this->datas[]     = $values;
    }

    /**
     * @param $axis
     * @param $values
     */
    public function add_labels($axis, $values)
    {
        $this->cached = false;

        // reverse order for Bar Horizontal
        if ('bhs' === $this->chart->cht && is_string($values[0])) {
            $values = array_combine(array_keys($values), array_reverse(array_values($values)));
        }
        $this->labels[$axis][] = $values;

        if ('x' === $axis || 't' === $axis) {
            $this->max_xt = max($this->max_xt, max($values));
            $this->min_xt = min($this->min_xt, min($values));
        }

        // min and max values for vertical axis are calculated in prepare_data()
    }

    /**
     * @param     $width
     * @param int $space
     */
    public function set_bar_width($width, $space = 0)
    {
        $this->cached      = false;
        $this->chart->chbh = (int)$width;
        if (0 != $space) {
            $this->chart->chbh .= ',' . $space;
        }
    }

    /**
     * @param $area
     * @param $type
     * @param $params
     */
    public function fill($area, $type, $params)
    {
        $this->cached       = false;
        $this->chart->chf[] = "$area,$type,$params";
    }

    /**
     * @param $array
     * @param $params
     */
    public function add_legend($array, $params)
    {
        $this->cached      = false;
        $this->chart->chdl = implode($params . '|', $array);
    }

    /**
     * @param $params
     */
    public function legend_params($params)
    {
        $this->cached       = false;
        $this->chart->chdlp = (string)$params;
    }

    /**
     * @param $params
     */
    public function world_params($params)
    {
        $this->cached      = false;
        $this->chart->chtm = (string)$params;
    }

    /**
     * @param $string
     */
    public function add_style($string)
    {
        $this->cached = false;
        if ('line' === $this->chart_type) {
            $this->chart->chls[] = $string;
        }
    }

    /**
     * @param $string
     */
    public function add_grid($string)
    {
        $this->cached = false;
        if ('line' === $this->chart_type || 'scatter' === $this->chart_type) {
            $this->chart->chg[] = $string;
        }
    }

    /**
     * @param $string
     */
    public function add_marker($string)
    {
        $this->cached = false;
        if ('line' === $this->chart_type || 'bar' === $this->chart_type || 'scatter' === $this->chart_type) {
            $this->chart->chm[] = $string;
        }
    }
    /* END PRE GENERATION FUNCTIONS */

    /* GENERATE FUNCTIONS : call prepare functions, prepare url, outputs url or full image string */
    /**
     * @return mixed
     */
    public function get_Image_URL()
    {
        if ($this->cached) {
            if (!$this->filename) {
                $this->generate_filename();
            }

            return $this->filename;
        } else {
            if (!$this->prepared) {
                $this->prepare();
            }

            return $this->chart_url;
        }
    }

    /**
     * @return string
     */
    public function get_Image_String()
    {
        if ($this->cached) {
            if (!$this->filename) {
                $this->generate_filename();
            }
            $string = '<img width="70%" alt="' . $this->title . '" src="' . $this->filename . '">';
        } else {
            if (!$this->prepared) {
                $this->prepare();
            }
            $string = '<img width="70%" alt="' . @$this->title . '" src="' . $this->chart_url . '">';
        }

        return $string;
    }

    public function prepare()
    {
        if (!$this->data_prepared) {
            $this->prepare_data();
        }
        $this->prepare_labels();
        $this->prepare_title();
        $this->prepare_styles();
        $this->prepare_url();
        $this->prepared = true;
    }
    /* END GENERATE FUNCTIONS */

    /* CACHE FUNCTIONS */
    public function generate_filename()
    {
        $this->filename = urlencode($this->title) . '.png';
    }

    /**
     * @return bool
     */
    public function save_Image()
    {
        if (!$this->filename) {
            $this->generate_filename();
        }
        /* get image file */
        //$this->chart_url = htmlspecialchars($this->chart_url);
        //$this->chart_url = urlencode($this->chart_url);

        if (function_exists('file_get_contents') && $this->image_content = file_get_contents($this->chart_url)) {
            $this->image_fetched = true;
        }

        if (!$this->image_fetched) {
            if ($fp = fopen($this->chart_url, 'r')) {
                $this->image_content = fread($fp);
                fclose($fp);
                $this->image_fetched = true;
            }
        }

        /* write image to cache */
        if ($this->image_fetched) {
            $fp = fopen($this->filename, 'w+');
            if ($fp) {
                fwrite($fp, $this->image_content);
                fclose($fp);
            } else {
                return false;
            }
        } else {
            return false;
        }

        return true;
    }

    /* PREPARE FUNCTIONS : called by generate functions, these ones parse labels and data */
    public function prepare_url()
    {
        $this->chart_url = $this->base_url;
        /*
        foreach ($this->mandatory_parameters as $param) {
        if(!isset($this->chart->$param)) return false;
        $params[] = $param.'='.$this->chart->$param;
        }
        */
        foreach ($this->chart as $k => $v) {
            if ('' != $v) {
                $params[] = "$k=$v";
            }
        }
        $this->chart_url .= implode('&', $params);
    }

    public function prepare_styles()
    {
        // SIZE

        if (($this->width * $this->height) > 300000) {

            // reduces dimensions to match API limits ( 300mpixels )
            $size         = $this->width * $this->height;
            $this->width  = round($this->width * (300000 / $size), 0);
            $this->height = round($this->height * (300000 / $size), 0);
        }
        $this->chart->chs = $this->width . 'x' . $this->height;

        // colors
        if (isset($this->chart->chco) && is_array($this->chart->chco)) {
            $this->chart->chco = implode(',', $this->chart->chco);
        }
        if (isset($this->chart->chf) && is_array($this->chart->chf)) {
            $this->chart->chf = implode('|', $this->chart->chf);
        }

        // styles
        if ('scatter' === $this->chart_type || 'bar' === $this->chart_type || 'line' === $this->chart_type) {
            if ('line' === $this->chart_type) {
                if (isset($this->chart->chls) && count($this->chart->chls)) {
                    $this->chart->chls = implode('|', $this->chart->chls);
                }
            }
            if (isset($this->chart->chg) && count($this->chart->chg)) {
                $this->chart->chg = implode('|', $this->chart->chg);
            }
            // markers
            if (isset($this->chart->chm) && count($this->chart->chm)) {
                $this->chart->chm = implode('|', $this->chart->chm);
            }
        }
    }

    public function prepare_size()
    {
    }

    public function prepare_data()
    {
        // for lines charts, calculate ratio
        if ('line' === $this->chart_type || 'bar' === $this->chart_type || 'scatter' === $this->chart_type) {
            $this->max_yr = 0;
            foreach ($this->datas as $n => $data) {
                if ('scatter' === $this->chart_type && 2 == $n) {
                    continue;
                } // ignore min max values for plots sizes
                $this->max_yr = max($this->max_yr, max($data));
                $this->min_yr = min($this->min_yr, min($data));
            }
            $this->ratio = 0.9 * $this->range / $this->max_yr;
        }

        foreach ($this->datas as $n => $data) {
            if ('scatter' === $this->chart_type && 2 == $n) {
                $data = $this->encode_data($data, false);
            } // do not normalize plots sizes
            //else $data = $this->encode_data($data);

            if ('lxy' === $this->chart->cht) {
                $this->datas[$n] = implode($this->sep, array_keys($data)) . '|' . implode($this->sep, array_values($data));
            } else {
                $this->datas[$n] = implode($this->sep, $data);
            }
        }

        $this->chart->chd    = "$this->encoding:";
        $this->chart->chd    .= implode($this->set, $this->datas);
        $this->data_prepared = true;
    }

    public function prepare_labels()
    {
        //chxt= axis titles
        //chxl= set:labels
        //chxr= range
        //chxp= positions
        if (isset($this->labels)) {
            $n = 0;
            if (count($this->labels)) {
                foreach ($this->labels as $axis => $labelles) {
                    foreach ($labelles as $pos => $labels) {
                        // axis type
                        $this->chart->chxt[$n] = $axis;
                        if (!count($labels)) {
                            continue;
                        } // no values = "neither positions nor labels. The Chart API therefore assumes a range of 0 to 100 and spaces the values evenly."
                        // axis range

                        if ('line' === $this->chart_type || 'bar' === $this->chart_type) {
                            if ('x' === $axis || 't' === $axis) {
                                if ($this->max_xt) {
                                    $this->chart->chxr[$n] = $n . ',' . $this->min_xt . ',' . $this->max_xt;
                                }
                            } else {
                                if ($this->max_yr) {
                                    $this->chart->chxr[$n] = $n . ',' . $this->min_yr . ',' . $this->max_yr;
                                }
                            }
                        }

                        // axis labels
                        if ('pie' === $this->chart_type) {
                            if ('p' === $axis) {
                                $this->chart->chl[$n] = implode('|', $labels);
                            }
                        }

                        if ('world' === $this->chart_type) {
                            $this->chart->chld[$n] = implode('|', $labels);
                        }

                        ++$n;
                    }
                }
            }
        }
        if (isset($this->chart->chxr)) {
            $this->chart->chxr = implode('|', $this->chart->chxr);
        }
        if (isset($this->chart->chxp)) {
            $this->chart->chxp = implode('|', $this->chart->chxp);
        }
        if (isset($this->chart->chxt)) {
            $this->chart->chxt = implode(',', $this->chart->chxt);
        }
        if (isset($this->chart->chxl)) {
            $this->chart->chxl = implode('|', $this->chart->chxl);
        }
        if (isset($this->chart->chl)) {
            $this->chart->chl = implode(',', $this->chart->chl);
        }
        if (isset($this->chart->chld)) {
            $this->chart->chld = implode('|', $this->chart->chld);
        }
    }

    public function prepare_title()
    {
        //chtt=first+line|second+line
        if (isset($this->title)) {
            $this->chart->chtt = str_replace(["\n", "\n\r", '<br>', '<br>'], '|', $this->title);
            $this->chart->chtt = str_replace(' ', '+', $this->chart->chtt);
        }
    }

    /* END PREPARE FUNCTIONS */

    /* ENCODING */
    /**
     * @param      $data
     * @param bool $ratio
     *
     * @return mixed
     */
    public function encode_data($data, $ratio = true)
    {
        if ('s' === $this->encoding) {
            foreach ($data as $n => $value) {
                if (empty($value) || '' == $value) {
                    $data[$n] = $this->missing;
                } else {
                    $data[$n] = $this->simple_encoding[$value];
                }
            }
        } elseif ('t' === $this->encoding) {
            foreach ($data as $n => $value) {
                if (empty($value) || '' == $value) {
                    $data[$n] = $this->missing;
                } elseif ($ratio && $this->ratio) {
                    $data[$n] = round($value * $this->ratio, 1);
                } else {
                    $data[$n] = (float)$value;
                }
            }
        } elseif ('e' === $this->encoding) {
            $max = 0;
            $min = 100000;
            foreach ($data as $n => $value) {
                if (empty($value) || '' == $value) {
                    $data[$n] = $this->missing;
                } else {
                    // normalize
                    if ($ratio && $this->ratio) {
                        $value = round($value * $this->ratio, 0);
                    }
                    // encode
                    $max      = max($max, $value);
                    $min      = min($min, $value);
                    $value    = $this->extended_encode($value);
                    $data[$n] = $value;
                }
            }
        }

        return $data;
    }

    /**
     * @param $value
     *
     * @return string
     */
    public function extended_encode($value)
    {
        $first  = floor($value / 64);
        $second = $value - ($first * 64);
        $first  = $this->extended_encoding[$first];
        $second = $this->extended_encoding[$second];

        return $first . $second;
    }
}
