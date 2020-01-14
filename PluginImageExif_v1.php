<?php
class PluginImageExif_v1{
  /**
   * Widget to show exif data of an image.
   */
  public static function widget_imagedata($data){
    wfPlugin::includeonce('wf/array');
    $data = new PluginWfArray($data);
    $app_dir = wfArray::get($GLOBALS, 'sys/app_dir');
    $element = array();
    if(wfFilesystem::fileExist($app_dir.$data->get('data/filename'))){
      $exif = PluginImageExif_v1::getImageData($data->get('data/filename'));
      foreach ($exif as $key => $value) {
        $ul = wfDocument::createHtmlElementAsObject('ul');
        foreach ($value as $key2 => $value2) {
          $ul->set('innerHTML/', wfDocument::createHtmlElement('li', $key2.': '.$value2));
        }
        $element[] = wfDocument::createHtmlElement('h1', $key);
        $element[] = $ul->get();
      }
      wfDocument::renderElement($element);
    }
  }
  /**
   * Get image data as an array.
   * @param string $filename Without Buto application root.
   * @return array
   */
  public static function getImageData($filename){
    $exif = exif_read_data(wfArray::get($GLOBALS, 'sys/app_dir').$filename, 0, true);
    return $exif;
  }
}
