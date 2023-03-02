<?php
include_once $layout.'/header.php'
?>


    <div class="container-fuild bg-lgts">
        <div class="container">
            <h2 class="title-search" data-in="slideDown" data-out="slideUp" data-duration="500" data-delay="200">
              Contactez nous
            </h2>
        </div>
    </div>
    <div class="container">
        <div class="row p79-0">
            <div class="contact-us-area">
                <div class="container">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="contact-us-content-left">
                                <div class="contact">
                                    <h4><i class="fa fa-map-marker"></i>Localisation</h4>
                                    <p>Abidjan Yopougon <br> Rue</p>
                                </div>

                                <div class="contact">
                                    <h4 class="font-15"><i class="fa fa-map-marker"></i>Adresse</h4>
                                    <p>Abidjan, Yopougon BAE</p>
                                </div>
                                <div class="contact">
                                    <h4 class="font-15"><i class="fa fa-envelope"></i>Mail</h4>
                                    <p>support@ccgim.com</p>
                                </div>
                                <div class="contact">
                                    <h4 class="font-15"><i class="fa fa-phone-square"></i>Téléphone</h4>
                                    <p>+225 07 03 32 59 24 <br/>+225 07 07 85 65 28</p>
                                </div>
                                <div class="contact">
                                    <h4><i class="fa fa-user"></i>Réseaux sociaux</h4>
                                    <div class="social-icon">
                                        <a href="#"><i class="fa fa-facebook"></i></a>
                                        <a href="#"><i class="fa fa-twitter"></i></a>
                                        <a href="#"><i class="fa fa-instagram"></i></a>
                                        <a href="#"><i class="fa fa-google-plus"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-8">
                            <div class="contact-us-content-right">
                                <form action="#">
                                    <img src="<?=$cdn_domaine?>/media/envelope.jpg" alt="envelope" />
                                    <div class="input-content clearfix">
                                        <h3>Avez une question ?</h3>
                                        <div class="row">
                                            <div class="col-sm-6">
                                                <input type="text" placeholder="Nom & Prénom*" name="nom" class="form-control">
                                            </div>
                                            <div class="col-sm-6">
                                                <input type="email" placeholder="Email*" name="email" class="form-control Email">
                                            </div>
                                            <div class="col-md-12">
                                                <input type="text" placeholder="Sujet*" name="sujet" class="form-control website">
                                            </div
                                            <div class="col-md-12">
                                                <textarea rows="2" cols="80">Message</textarea>
                                            </div>
                                        </div>
                                        <div class="subimt-button clearfix pt-3">
                                            <button  class="btn-register btn-contact">Envoyer</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="map-area" style="padding-bottom: 30px">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="map-content">
                                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3972.4431673262293!2d-4.098919285725766!3d5.3491296371842605!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0xfb83a8e9beff779%3A0x56c916b7e211bb86!2sYOPOUGON%2C%20ANANERAIE!5e0!3m2!1sfr!2sci!4v1676626218126!5m2!1sfr!2sci" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                            </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

<?php include_once $layout.'/footer.php'?>




<?php
include_once $layout.'/footer.php'
?>