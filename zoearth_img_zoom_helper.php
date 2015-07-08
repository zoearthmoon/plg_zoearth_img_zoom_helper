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
		
		$menu = $app->getMenu();
		if ($menu->getActive() != $this->params->get('menuId'))//限定某些menu
		{
			return FALSE;
		}
		$viewVal = $this->params->get('viewVal');//限定某些頁面
		if ($viewVal != '' && JRequest::getVar('Itemid') != $viewVal)
		{
			return FALSE;
		}
		
		//20150531 zoearth 載入JS
		
		
		
		
		
		
		
		
		
		
		
		
		
    }
}