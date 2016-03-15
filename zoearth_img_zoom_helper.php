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
        
        //20160315 zoearth 針對大於500圖片有連結圖片修改
        $item->introtext = preg_replace_callback('/<a[^>]{1,}><img[^>]{1,}src="images\/([^"]*)"[^>]{1,}\/><\/a>/im',function($matches){
            if (file_exists(JPATH_ROOT.DS.'images'.DS.$matches[1]))
            {
                list($width, $height) = getimagesize(JPATH_ROOT.DS.'images'.DS.$matches[1]);
                if ($width >= 500)
                {
                    //20160315 zoearth 修改為縮圖
                    $sImg = Z2HelperImage::_('images/'.$matches[1],500,800);
                    return '<a href="images/'.$matches[1].'" rel="lightbox" ><img src="'.$sImg.'" class="img-polaroid" ></a>';
                }
            }
            return $matches[0];
        },$item->introtext);
        
        //20160315 zoearth 針對大於500圖片
        $item->introtext = preg_replace_callback('/<img[^>]{1,}src="images\/([^"]*)"[^>]{1,}\/>/im',function($matches){
            if (file_exists(JPATH_ROOT.DS.'images'.DS.$matches[1]))
            {
                list($width, $height) = getimagesize(JPATH_ROOT.DS.'images'.DS.$matches[1]);
                if ($width >= 500)
                {
                    //20160315 zoearth 修改為縮圖
                    $sImg = Z2HelperImage::_('images/'.$matches[1],500,800);
                    return '<a href="images/'.$matches[1].'" rel="lightbox" ><img src="'.$sImg.'" class="img-polaroid" ></a>';
                }
            }
            return $matches[0];
        },$item->introtext);
        $item->introtext .= '<style type="text/css">.img-polaroid.lightboximg{cursor: pointer !important;}</style>';
    }
}