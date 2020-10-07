# Php Upload Manager

The Repo: [Php Upload Repository][repolink]

Manage your upload as easiest as possible!

## Installation
<br/>

Via [Composer][dc1]:

    $ composer require fabriziomanca/phpupload

<br/>

## Usage
<br/>

```php
use fabriziomanca\phpupload\phpUpload;
$pUp = new phpUpload($_FILES['file']);
$pUp->maxSize('1024'); // Set a Size Limit in KB
$pUp->allowedType(["image/jpeg", "image/png"]); // Set allowed mime type (image/jpeg, application/pdf, image/png, etc)
$pUp->newName("New_name"); // Set a new name for the file
$pUp->run('destination/folder'); // Move the file to a specific folder
```


<br/>

#### License
tesseract-ocr-for-php is released under the [MIT License][mit].

<br/>

[dc1]: http://getcomposer.org/
[repolink]: https://github.com/fabriziomanca/phpUpload
[mit]: https://github.com/fabriziomanca/phpUpload/blob/master/LICENSE