<div class="section contact" id="section_contact">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
    <div class="contact__form">
        <h1 class="contact__form__title">Contact</h1>
        <p class="contact__form__description">You can contact me with the contact form down below or with one of the options in the sidebar.</p>
        <form class="contact__form__form" action="" method="post">
            <label for="form_name">Name</label>
            <input id="form_name" type="text" name="name" placeholder="Please enter your name..." required  maxlength="255" minlength="2">
            <label for="form_email">E-mail Address</label>
            <input id="form_email" type="email" name="email" placeholder="Please enter your e-mail address..." required  maxlength="255" minlength="6">
            <label for="form_message">Message</label>
            <textarea id="form_message" name="message" rows="5" placeholder="Please enter your message." required maxlength="255" minlength="6"></textarea>
            <p id="form_error"></p>
            <input type="submit" value="Send Message">
            <input type="hidden" name="token" value="<?php if(!is_null($_SESSION['token'])){echo$_SESSION['token'];}  ?>">
        </form>
        <script>
        $(".contact__form__form").submit(function(e) {
            e.preventDefault();
            var form = $(this);
            var url = form.attr('action');
            $.ajax({
                type: "POST",
                url: url,
                data: form.serialize(),
                success: function(data) {
                    console.log(data);
                    var obj = jQuery.parseJSON(data);
                    console.log(obj);

                    document.getElementById('form_error').innerHTML = obj.response;
                    if(!obj.error) {
                        document.getElementById('form_error').style.color = "#FFF";
                    }
                }
            });
        });
        </script>
    </div>
    <div class="contact__media">
        <p class="contact__media__title">External Media:</p>
        <a class="style__nolink" href="mailto:joshua@jvdpoll.nl" target="_blank"> 
            <div class="contact__media__link">
                <div class="contact__media__link__image"><img src="/public/images/other/email.png" alt="Email icon" class="contact__media__link__image__src"></div>
                <div>
                    <p class="contact__media__link__name">E-mail Address</p>
                    <p class="contact__media__link__task">joshua@jvdpoll.nl</p> 
                </div>
            </div>
        </a>
        <a class="style__nolink" href="https://www.linkedin.com/in/joshuavdpoll" target="_blank">
            <div class="contact__media__link">
                <div class="contact__media__link__image"><img src="/public/images/other/linkedin.png" alt="LinkedIn icon" class="contact__media__link__image__src"></div>
                <div>
                    <p class="contact__media__link__name">LinkedIn</p>
                    <p class="contact__media__link__task">Joshuavdpoll</p>
                </div>
            </div>
        </a>
        <a class="style__nolink" href="https://wa.me/31637788390" target="_blank">
            <div class="contact__media__link">
                <div class="contact__media__link__image"><img src="/public/images/other/whatsapp.png" alt="WhatsApp icon" class="contact__media__link__image__src"></div>
                <div>
                    <p class="contact__media__link__name">WhatsApp</p>
                    <p class="contact__media__link__task">+31 6 37788390</p>
                </div>
            </div>
        </a>
        <a class="style__nolink" href="https://www.hackthebox.eu/profile/233053" target="_blank">
            <div class="contact__media__link">
                <div class="contact__media__link__image"><img src="/public/images/other/hackthebox.png" alt="HackTheBox icon" class="contact__media__link__image__src"></div>
                <div>
                    <p class="contact__media__link__name">HackTheBox</p>
                    <p class="contact__media__link__task">Luseres</p>
                </div>
            </div>
        </a>
    </div>
</div>