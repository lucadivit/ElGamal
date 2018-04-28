<?php
/* Smarty version 3.1.29, created on 2016-05-26 16:26:47
  from "C:\xampp\htdocs\ElGamal\smarty\templates\index.tpl" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_574707a75ec920_44866481',
  'file_dependency' => 
  array (
    'd5bcc616b95b67471f17bf2611104cd11c4bc38b' => 
    array (
      0 => 'C:\\xampp\\htdocs\\ElGamal\\smarty\\templates\\index.tpl',
      1 => 1464272779,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_574707a75ec920_44866481 ($_smarty_tpl) {
?>
<html>
    <head>
        <link rel="stylesheet" href="./CSS/bootstrap.min.css" >
        <link rel="stylesheet" href="./CSS/main.css" >
        <?php echo '<script'; ?>
 src="./JS/jquery-2.2.4.min.js"><?php echo '</script'; ?>
>
        <?php echo '<script'; ?>
 src="./JS/bootstrap.min.js"><?php echo '</script'; ?>
>
        <?php echo '<script'; ?>
 src="./JS/main.js"><?php echo '</script'; ?>
>
    </head>
    <body>
        <ul class="nav nav-tabs nav-justified" id="barMenu">
            <li id="ElGamalBarLi" role="presentation" class="active"><a id="ElGamalBarA" href="#"><h3>ElGamal</h3></a></li>
            <li id="slideBarLi" role="presentation"><a id="slideBarA" href="#"><h3>Slide</h3></a></li>
            <li role="presentation" class="dropdown"><a href="#" data-toggle="modal" data-target="#myInfo" id=""><h3>Info</h3></a></li>
        </ul>
        <br>
        <div id="contenitore">
        </div>
        <div>
            <div class="modal fade" id="myInfo" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title" id="myModalLabel">Author Info.</h4>
                        </div>
                        <div class="modal-body">
                            <blockquote>
                                <p><strong>Name: </strong>Luca Di Vita</p>
                                <p><strong>Mat.: </strong> 210430</p>
                            </blockquote>
                            <blockquote>
                                <p><span class="glyphicon glyphicon-envelope" aria-hidden="true"></span> luca.di.vita@hotmail.it </p>
                            </blockquote>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html><?php }
}
