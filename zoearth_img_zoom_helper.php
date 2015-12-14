<?php
defined('_JEXEC') or die ;

jimport('joomla.plugin.plugin');

class plgZ2Zoearth_Img_Zoom_Helper extends JPlugin
{
    //20150319 zoearth 針對購物車選單
    function onZ2ShowItemView($option=array())
    {
        $item =& $option['item'];
        
        //$tWidth = (int)$this->params->get('width');
        //20151126 zoearth 分析圖片(取得大小，超過500寬加上)
        $item->introtext = preg_replace_callback('/src="images\/([^"]{1,})"/',function($matches){
            if (file_exists(JPATH_ROOT.DS.'images'.DS.$matches[1]))
            {
                list($width, $height) = getimagesize(JPATH_ROOT.DS.'images'.DS.$matches[1]);
                if ($width >= 500)
                {
                    return 'src="images/'.$matches[1].'" class="img-polaroid lightboximg" ';
                }
            }
            return $matches[0];
        },$item->introtext);
        $item->introtext .= '<style type="text/css">.img-polaroid.lightboximg{cursor: pointer !important;}</style>';
    }
}