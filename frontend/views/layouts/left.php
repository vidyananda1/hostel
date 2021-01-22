<aside class="main-sidebar" style="box-shadow: 0px 0px 20px grey; ">

    <section class="sidebar">

      <div class="user-panel">
          <div class="text-center">
            <img src="images/user.png" height=50 class="img-circle" alt="User Image">
          </div>
            <div class="text-center">
              <h5>Hello ! <?= strtoupper(Yii::$app->user->identity->username)?></h5>
            </div>
          <hr style="border:solid 1px #c2bbba">
          </div>

        <?= dmstr\widgets\Menu::widget(
            [
                'options' => ['class' => 'sidebar-menu tree', 'data-widget'=> 'tree'],
                'items' => [
                  
					            ['label' => 'Dashboard','icon' => 'home', 'url' => ['/site/index']],
                      
                      ['label' => 'Registration','icon' => ' fa-user-plus', 'url' => ['/registration/index']],
                      // ['label' => 'Referral-Details','icon' => ' fa-users', 'url' => ['/referral-details/index']],
                      ['label' => 'Collect Fee','icon' => 'usd', 'url' => ['/fee-counter']],
                      
                      ['label' => 'Generate Reports','icon' => 'file', 'url' => ['/report']],
                      ['label' => 'Expenses','icon' => 'money', 'url' => ['/expense']],
                      
                     

                       [
								'label' => 'Master-Settings',
								'icon' => 'wrench',
								'items' => [
                             ['label' => 'User-Management','url' => ['/staff']],
									           ['label' => 'Month Set-up','url' => ['/month']],
                             ['label' => 'Batch Set-up', 'url' => ['/batch']],
                             ['label' => 'Admission fee Set-up', 'url' => ['/admission-fee']],
                             ['label' => 'Monthly fee Set-up', 'url' => ['/monthly-fee']],
                             ['label' => 'Set Discount', 'url' => ['/discount']],
                             ['label' => 'Set Discount-category', 'url' => ['/discount-cat']],
                             
					                
								],
								 // 'visible' => !Yii::$app->user->isGuest && Yii::$app->user->can('admin'),
						],
                        // 'visible' => !Yii::$app->user->isGuest && Yii::$app->user->can('admin'),
					
                ], // item
            ]
        ) ?>

    </section>

</aside>
<style>
    
</style>