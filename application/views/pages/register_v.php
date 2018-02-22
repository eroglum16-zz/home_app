
	<div class="container">
        <div class="row">
            <div class="col-md-5 col-md-offset-2">
                        <form role="form" action="<?php echo site_url(); ?>/login/register" method="post">
                            <fieldset>
                                <div class="form-group">
                                    <label for="name">İsim:</label>
                                    <input class="form-control" placeholder="Adınızı yazın..." name="name" type="text" autofocus required>
                                </div>
                                <div class="form-group">
                                    <label for="surname">Soyisim:</label>
                                    <input class="form-control" placeholder="Soyadınızı yazın..." name="surname" type="text" required >
                                </div>
                                <div class="form-group">
                                    <label for="email">Email:</label>
                                    <input class="form-control" placeholder="E-mail adresinizi yazın..." name="email" type="email" required>
                                </div>
                                <div class="form-group">
                                    <label for="password">Şifre:</label>
                                    <input class="form-control" id="password" placeholder="Bir şifre belirleyin..." name="password" type="password" value="" required>
                                </div>
                                <div class="form-group">
                                    <label for="password2">Şifre tekrar:</label>
                                    <input class="form-control" id="confirm_password"  placeholder="Belirlediğiniz şifreyi tekrar girin..." name="password2" type="password" value="" required >
                                    
                                </div>
                                <div class="checkbox">
                                    <label>
                                        <input required="" name="terms" id="terms" type="checkbox" value="approved"><strong>Uyarı: </strong>Bu uygulamanın bir ev halkına ait olduğunun, o evde yaşamayan insanların kaydının kabul edilmeyeceğinin farkındayım.
                                    </label>
                                </div>
                                <!-- Change this to a button or input when using this as a form -->

                                <button type="submit" name="submit" class="btn btn-lg btn-info btn-block"> Kayıt Ol </button>
                            </fieldset>
                        </form>                   
            </div>
        </div>
    </div>

    <script type="text/javascript">
        var password = document.getElementById("password")
          , confirm_password = document.getElementById("confirm_password");

        function validatePassword(){
          if(password.value != confirm_password.value) {
            confirm_password.setCustomValidity("Şifreler eşleşmiyor");
          } else {
            confirm_password.setCustomValidity('');
          }
        }

        password.onchange = validatePassword;
        confirm_password.onkeyup = validatePassword;
    </script>

    
