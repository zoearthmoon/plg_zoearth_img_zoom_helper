<?php
defined('_JEXEC') or die ;

jimport('joomla.plugin.plugin');

class plgSystemZoearth_Iframe_Responsive extends JPlugin
{
    function onAfterRender()
    {
        $app = JFactory::getApplication();
        if ($app->isSite())
        {
            $response = JResponse::getBody();
            //有 https://www.youtube.com/watch?
            if (strpos($response,'<iframe'))
            {
                //加上CSS
                static $showed;
                if (!$showed)
                {
                    $showed = TRUE;
                    //載入JS CSS
                    $addText = '
                    <style type="text/css">
                    .video-container {
                        position: relative;
                        padding-bottom: 56.25%;
                        padding-top: 30px; height: 0; overflow: hidden;
                    }
                    @media all and (max-width: 1024px) {
                        .video-container iframe,
                        .video-container object,
                        .video-container embed {
                            position: absolute;
                            top: 0;
                            left: 0;
                            width: 100%;
                            height: 100%;
                        }
                    }
                    </style>';
                    $response = str_replace('</head>',$addText.'</head>',$response);
                    
                    //修改 iframe
                    $response = str_replace('<iframe','<div class="video-container"><iframe',$response);
                    $response = str_replace('</iframe>','</iframe></div>',$response);
                    JResponse::setBody($response);
                }
            }
        }
    }
}