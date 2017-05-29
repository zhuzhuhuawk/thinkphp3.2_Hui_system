<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
	<script src="http://cdn.alloyui.com/3.0.1/aui/aui-min.js"></script>
	<link href="http://cdn.alloyui.com/3.0.1/aui-css/css/bootstrap.min.css" rel="stylesheet" />
</head>
<body>

<div class="container">
	<div id="myAlert" class="alert alert-danger">
    I’m sorry, but the princess is in another castle!
</div>


<div id="myColorPalette"></div>

<div id="myCarousel">
  <div class="image-viewer-base-image" style="background: url(http://alloyui.com/carousel/img/1.jpg);"></div>
  <div class="image-viewer-base-image" style="background: url(http://alloyui.com/carousel/img/2.jpg);"></div>
  <div class="image-viewer-base-image" style="background: url(http://alloyui.com/carousel/img/3.jpg);"></div>
  <div class="image-viewer-base-image" style="background: url(http://alloyui.com/carousel/img/4.jpg);"></div>
</div>


<div id="myFormBuilder"></div>
  </div>
<script>
	YUI().use(
  'aui-alert',
  function(Y) {
    new Y.Alert(
      {
        closeable: true,
        render: true,
        srcNode: '#myAlert'
      }
    );
  },
  'aui-color-palette',
  function(Y) {
    new Y.ColorPalette().render('#myColorPalette');
  }, 'aui-carousel',
  function(Y) {
    new Y.Carousel(
      {
        contentBox: '#myCarousel',
        height: 250,
        width: 400
      }
    ).render();
  },'aui-form-builder',
  function(Y) {
    new Y.FormBuilder(
      {
        availableFields: [
          {
            iconClass: 'form-builder-field-icon-text',
            id: 'uniqueTextField',
            label: 'Text',
            readOnlyAttributes: ['name'],
            type: 'text',
            unique: true,
            width: 75
          },
          {
            hiddenAttributes: ['tip'],
            iconClass: 'form-builder-field-icon-textarea',
            label: 'Textarea',
            type: 'textarea'
          },
          {
            iconClass: 'form-builder-field-icon-checkbox',
            label: 'Checkbox',
            type: 'checkbox'
          },
          {
            iconClass: 'form-builder-field-icon-button',
            label: 'Button',
            type: 'button'
          },
          {
            iconClass: 'form-builder-field-icon-select',
            label: 'Select',
            type: 'select'
          },
          {
            iconClass: 'form-builder-field-icon-radio',
            label: 'Radio Buttons',
            type: 'radio'
          },
          {
            iconClass: 'form-builder-field-icon-fileupload',
            label: 'File Upload',
            type: 'fileupload'
          },
          {
            iconClass: 'form-builder-field-icon-fieldset',
            label: 'Fieldset',
            type: 'fieldset'
          }
        ],
        boundingBox: '#myFormBuilder',
        fields: [
          {
            label: 'City',
            options: [
              {
                label: 'Ney York',
                value: 'new york'
              },
              {
                label: 'Chicago',
                value: 'chicago'
              }
            ],
            predefinedValue: 'chicago',
            type: 'select'
          },
          {
            label: 'Colors',
            options: [
              {
                label: 'Red',
                value: 'red'
              },
              {
                label: 'Green',
                value: 'green'
              },
              {
                label: 'Blue',
                value: 'blue'
              }
            ],
            type: 'radio'
          }
        ]
      }
    ).render();
  }
);
</script>
</body>
</html>