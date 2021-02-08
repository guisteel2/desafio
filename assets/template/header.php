<!doctype html>
<html style="height: 100% !important;">
  <head>
    <title>Webjump | Backend Test | Dashboard</title>
    <meta charset="utf-8">

      <link  rel="stylesheet" type="text/css"  media="all" href="/assets/css/style.css" />
      <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,800" rel="stylesheet">
      <meta name="viewport" content="width=device-width,minimum-scale=1">
      <style amp-boilerplate>body{-webkit-animation:-amp-start 8s steps(1,end) 0s 1 normal both;-moz-animation:-amp-start 8s steps(1,end) 0s 1 normal both;-ms-animation:-amp-start 8s steps(1,end) 0s 1 normal both;animation:-amp-start 8s steps(1,end) 0s 1 normal both}@-webkit-keyframes -amp-start{from{visibility:hidden}to{visibility:visible}}@-moz-keyframes -amp-start{from{visibility:hidden}to{visibility:visible}}@-ms-keyframes -amp-start{from{visibility:hidden}to{visibility:visible}}@-o-keyframes -amp-start{from{visibility:hidden}to{visibility:visible}}@keyframes -amp-start{from{visibility:hidden}to{visibility:visible}}</style><noscript><style amp-boilerplate>body{-webkit-animation:none;-moz-animation:none;-ms-animation:none;animation:none}</style></noscript>
      <script async src="https://cdn.ampproject.org/v0.js"></script>
      <script async custom-element="amp-fit-text" src="https://cdn.ampproject.org/v0/amp-fit-text-0.1.js"></script>
      <script async custom-element="amp-sidebar" src="https://cdn.ampproject.org/v0/amp-sidebar-0.1.js"></script>
      <script type="text/javascript">

        function showPreview(event){
            if(event.target.files.length > 0){
                var src = URL.createObjectURL(event.target.files[0]);
                var preview = document.getElementById("file-ip-1-preview");
                preview.src = src;
                preview.style.display = "block";
            }
        }
        
        </script>
  </head>
 
  <body id="body">
  <!-- Header -->
  <amp-sidebar id="sidebar" class="sample-sidebar" layout="nodisplay" side="left">
  <div class="close-menu">
    <a on="tap:sidebar.toggle">
      <img src="/assets/images/bt-close.png" alt="Close Menu" width="24" height="24" />
    </a>
  </div>
  <a href="/">
    <img src="/assets/images/menu-go-jumpers.png" alt="Welcome" width="200" height="43" />
  </a>
  <div>
    <ul>
      <li><a href="/assets/categories.php" class="link-menu">Categorias</a></li>
      <li><a href="/assets/products.php" class="link-menu">Produtos</a></li>
    </ul>
  </div>
</amp-sidebar>

<header>
  <div class="go-menu">
    <a on="tap:sidebar.toggle">☰</a>
    <a href="/" class="link-logo">
      <img src="/assets/images/go-logo.png" alt="Welcome" width="69" height="430" />
    </a>
  </div>
  <div class="right-box">
    <span class="go-title">Administration Panel</span>
  </div>    
</header>  
<!-- Header -->