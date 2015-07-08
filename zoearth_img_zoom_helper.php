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
			
JHtml::script(Juri::base() . 'templates/custom/js/sample.js', $mootools);


$document = JFactory::getDocument();


$document->addScriptDeclaration('
    window.event("domready", function() {
        alert("An inline JavaScript Declaration");
    });
');


		}
    }
}