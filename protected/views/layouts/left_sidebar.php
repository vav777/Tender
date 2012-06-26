<?php
// $Id$

/**
 * @file
 * ${DESCRIPTION}
 */
 
?>
  <div class="secondary_menu_outer">
    <div id="secondary_menu">
      <?php $this->widget('zii.widgets.CMenu', array(
                                                    'items' => array(
                                                      array('label' => 'НОВОСТИ', 'url' => array('/site/news')),
                                                      array('label' => 'КАТАЛОГ ЗАКУПОК', 'url' => array('/site/catalog_buy')),
                                                      array('label' => 'ЗАКАЗЧИКАМ', 'url' => array('/site/customer')),
                                                      array('label' => 'УЧАСТНИКАМ', 'url' => array('/site/index')),
                                                      array('label' => 'ВОПРОСЫ-ОТВЕТЫ', 'url' => array('/site/index')),
                                                      array('label' => 'ЗАКОНОДАТЕЛЬСТВО', 'url' => array('/site/index')),
                                                      array('label' => 'ЦЕНЫ', 'url' => array('/site/contact')),
                                                      array('label' => 'ВЕСТНИК ГОСУДАРСТВЕННЫХ ЗАКУПОК', 'url' => array('/site/contact')),
                                                      array('label' => 'ФОРУМ', 'url' => array('/site/contact')),
                                                      array('label' => 'О НАС', 'url' => array('/site/contact')),
                                                      //array('label'=>'Login', 'url'=>array('/site/login'), 'visible'=>Yii::app()->user->isGuest),
                                                      //array('label'=>'Logout ('.Yii::app()->user->name.')', 'url'=>array('/site/logout'), 'visible'=>!Yii::app()->user->isGuest)
                                                    ),
                                               )); ?>
    </div>
  </div>
  <div class="news_widget">
    <ul>
      <li class="news_item">
        <h4 class="news_data">15.03.2012</h4>
        <span class="news_body">
          Военизированные горноспасательные отряды также проводят тендеры.
        </span> <br>
        <a href="#read_more">
         Читать далее.
        </a>
      </li>
      <li class="news_item">
        <h4 class="news_data">15.03.2012</h4>
        <span class="news_body">
          Военизированные горноспасательные отряды также проводят тендеры.
        </span> <br>
        <a href="#read_more">
          Читать далее.
        </a>
      </li>
      <li class="news_item">
        <h4 class="news_data">15.03.2012</h4>
        <span class="news_body">
          Военизированные горноспасательные отряды также проводят тендеры.
        </span> <br>
        <a href="#read_more">
          Читать далее.
        </a>
      </li>
      
    </ul>
  </div>