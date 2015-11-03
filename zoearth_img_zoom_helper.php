<?php
defined('_JEXEC') or die ;

jimport('joomla.plugin.plugin');

class plgSystemZoearth_Img_Zoom_Helper extends JPlugin
{
    function onAfterRoute()
    {
        $app = JFactory::getApplication();
        if (!$app->isSite())
        {
            return FALSE;
        }
        
        $selector = $this->params->get('selector');//選擇器
        if ($selector != '' )
        {
            //20150708 zoearth 呼叫JS
            JHtml::script(Juri::base().'plugins/system/zoearth_img_zoom_helper/zoearth_img_zoom_helper.js');
            $document = JFactory::getDocument();
            $document->addScriptDeclaration('var imgZoomSelect = "'.$selector.'";');
            $document->addStyleDeclaration('.lightboximg{cursor: pointer !important;}');
        }
    }
}