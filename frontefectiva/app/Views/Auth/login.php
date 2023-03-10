<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="icon" type="image/png" href="<?=base_url('public/images/valtx.png') ?>" sizes="32x32">
  
    <!-- captcha refresh code -->
   
    
    <!-- Bootstrap CSS -->
    <link href="http://www.jqueryscript.net/css/jquerysctipttop.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link href="<?=base_url('public/assets/css/myCss.css')?>" rel="stylesheet">
    <link href="//cdn.jsdelivr.net/npm/@sweetalert2/theme-bootstrap-4/bootstrap-4.css" rel="stylesheet">
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.js"></script>
  
 <script>
    function getNewCaptcha() {
      event.preventDefault() 
      $.ajax({
          url: "<?=base_url('auth/getNewCaptcha');?>",
          beforeSend : function () {
            $ (' .loading ') .show ();
            $('#captImg').html('');
          },
          success:function (response) {
           
            $('#captImg').html(response);
            $ (' .loading ') .fadeOut ( "slow" );
          }
      })
  }
  window.addEventListener('click', function(e){
      if (document.getElementById('pass').contains(e.target) || document.getElementById('softkeys').contains(e.target)){
          document.getElementById("softkeys").style.display="block";
    } else{
      document.getElementById("softkeys").style.display="none";
    }
  })
 </script>
   
    <title>Login</title>
  </head>
  <body>
    <div class="contenedor">
      <div class="contenedor_login">
        <div class="contenedor_login_img">
            <img src="<?=base_url('public/images/valtx.png')?>" alt="" class="contenedor_login_img_image">
        </div>
        <div class="v-line"></div>
        <div class="contenedor_login_body">
            <div class="contenedor_login_body_head">
                <div class="contenedor_login_body_head_icono">
                    <img src="<?=base_url('public/images/avatar_login.png')?>" alt="">
                </div>
                <div class="contenedor_login_body_head_titulo">
                    <span class="contenedor_login_titulo">Login</span>
                </div>
            </div>
           
            <div class="contenedor_login_body_body">
           
              <div class="col-md-12" style="margin-top:0.5rem" id="alert_login">
                                        
              </div>
                  <?php 
                                $session = session();
                                    if($session->getFlashdata('error') != '')
                                    {
                                    echo $session->getFlashdata('error');;
                                    }
                                ?>
              <!-- <?php //echo base_url();?>/auth/validaCaptcha -->
                <form  id="form_login" action="" method="post">
                        <div class="input-container">
                            <input
                                type="text"
                                id="username"
                                name="username"
                                class="text-input"
                                autocomplete="off"
                                placeholder=""
                                oninput="this.value = this.value.replace(/[^a-zA-Z0-9]/,'')"
                            />
                            <label class="label" for="username">Username</label>
                        </div>
                        <div class="input-container">
                          <div class="input-group-append">
                            <input
                                type="password"
                                id="pass"
                                name="pass"
                                class="text-input"
                                autocomplete="off"
                                placeholder=""
                                
                            />
                            <label class="label" for="pass">Password</label>
                           
                                <button id="show_password" class="btn btn-primary" type="button" title="Mostrar Clave"> <span class="fa fa-eye-slash icon"></span> </button>
                          </div>
                        </div>
                        <div class="softkeys" id="softkeys" style="display:none" data-target="input[name='pass']"></div>
                        <div class="captcha-box">
                            <div class="loading" style="display:none">
                                <div  class = "content" > 
                                    <img style="width:50px" src = " <?php  echo  base_url (). '/public/images/loading.gif' ;  ?> " /> 
                                </div> 
                            </div>
                          <span id="captImg"><?php echo $captcha;?></span>
                            <button class="btn btn-primary" onclick="getNewCaptcha()"><i class="fa fa-refresh text-white"></i></button>
                        </div>
                        <div class="input-container">
                            <input
                                type="text"
                                id="captcha"
                                name="captcha"
                                class="text-input"
                                autocomplete="off"
                                placeholder=""
                                oninput="this.value = this.value.replace(/[^a-zA-Z0-9]/,'')"
                            />
                            <label class="label" for="captcha" >C??digo de Seguridad</label>
                        </div>
                        <div class="col-lg-12">
                          <button type="" id="btn_Acceder" class="btn btn-primary" style="width:100%">Acceder</button>
                        </div>
                       

                       
                        
                    

                    
                </form>
               
            </div>
            <div class="col-lg-12">
                    <a href="<?php echo base_url();?>recover">??Olvidastes tu contrase??a?</a>
            </div>
        </div>
      </div>
      
    </div>
    <input type="hidden" name="" id="base_url" value=<?=base_url()?>>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js" integrity="sha512-aVKKRRi/Q/YV+4mjoKBsE4x3H+BkegoM/em46NNlCqNTmUYADjBbeNefNxYV7giUp0VxICtqdrbqU7iVaeZNXA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <script src="<?=base_url('public/assets/js/main.js')?>" crossorigin="anonymous"></script>
    <script src="<?=base_url('public/assets/js/login.js')?>" crossorigin="anonymous"></script>
   <script src="<?=base_url('public/assets/js/show_pass.js')?>" crossorigin="anonymous"></script>
   <script src="<?=base_url('public/assets/js/softkeys-0.0.1.js')?>" crossorigin="anonymous"></script>
   <script>
            $(document).ready(function(){
                $('.softkeys').softkeys({
                    target : $('.softkeys').data('target'),
                    layout : [
                        [
                            ['`','~'],
                            ['1','!'],
                            ['2','@'],
                            ['3','#'],
                            ['4','$'],
                            ['5','%'],
                            ['6','^'],
                            ['7','&amp;'],
                            ['8','*'],
                            ['9','('],
                            ['0',')'],
                            ['-', '_'],
                            ['=','+'],
                            'delete'
                        ],
                        [
                            'q','w','e','r','t','y','u','i','o','p',
                            ['[','{'],
                            [']','}']
                        ],
                        [
                            'capslock',
                            'a','s','d','f','g','h','j','k','l',
                            [';',':'],
                            ["'",'&quot;'],
                            ['\\','|']
                        ],
                        [
                            'shift',
                            'z','x','c','v','b','n','m',
                            [',','&lt;'],
                            ['.','&gt;'],
                            ['/','?'],
                            ['@']
                        ]
                    ]
                });
            });
        </script>
   <script type="text/javascript">

    var _gaq = _gaq || [];
    _gaq.push(['_setAccount', 'UA-36251023-1']);
    _gaq.push(['_setDomainName', 'jqueryscript.net']);
    _gaq.push(['_trackPageview']);

    (function() {
      var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
      ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
      var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
    })();

  </script>
  
    </body>
</html>