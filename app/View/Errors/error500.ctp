<?php
/**
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.View.Errors
 * @since         CakePHP(tm) v 0.10.0.1076
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */
?>
<h2><?php echo $message; ?></h2>


<div class="container">
	<h1 style="color: #00b7d7; font-weight: 600;"> Ha ocurrido un error </h1>
	<h2 style="color: #1c5d83;"> Estamos trabajando para solucionarlo </h2>
	<img src="<?=Router::url('/img/puzzle-pieces.png',true)?>"  class="img-responsive" style="margin-top: 5%; margin-left: auto; margin-right: auto;"> 
</div>
