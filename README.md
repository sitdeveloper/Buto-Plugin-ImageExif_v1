# Buto-Plugin-ImageExif_v1

Get image data from embedded tags.

## Usage
```
wfPlugin::includeonce('image/exif_v1');
$exif = new PluginImageExif_v1();
$filename = '/'.wfGlobals::getWebFolder().'/theme/image.png';
print_r($exif->getImageData($filename));
```
