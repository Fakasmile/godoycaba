    <main class="contact">
        <h1 class="for-seo">Contacto</h1>
        <form class="contact-form" action="/conact/" method="post" onsubmit="return false;">
            <div class="fields">
                <div>
                    <div class="field">
                        <input id="id_name" maxlength="512" name="name" placeholder="Nombres" type="text" required="">
                    </div>
                    <div class="field">
                        <input id="id_email" maxlength="512" name="email" placeholder="Email" type="email" required="">
                    </div>
                    <div class="field">
                        <input id="id_phone" maxlength="512" name="phone" placeholder="Teléfono" type="text" required="">
                    </div>
                    <div class="field">
                        <input id="id_subject" maxlength="512" name="subject" placeholder="Asunto" type="text" required="">
                    </div>
                    <div class="contact-info">
                        AV. DEL LIBERTADOR 14058.<br>
                        MARTINEZ. SAN ISIDRO. BS. AS. ARGENTINA.<br>
                        <a tabindex="-1" href="541147931900">Tel (011) 4793-1900</a><br>
                        <a tabindex="-1" href="mailto:info@godoyasesores.com" target="_blank">INFO@GODOYASESORES.COM</a>
                        <a tabindex="-1" href="https://www.facebook.com/inmobiliariagodoyasesores/" target="_blank" class="facebook">
                            <span class="for-seo">Facebook</span>
                        </a>
                    </div>
                </div>
                <div>
                    <div class="field">
                        <textarea cols="40" id="id_message" name="message" placeholder="Mensaje" rows="10" required=""></textarea>
                    </div>
                    <div class="buttons">
                        <button type="submit" data-loading-text="Enviando..." id="btnEnviarCOntatcto">
                            Enviar
                        </button>
                    </div>
                </div>
            </div>
            <div class="success-message">
                SU MENSAJE <br>
                HA SIDO ENVIADO, <br>
                NOS COMUNICAREMOS <br>
                CON USTED A LA BREVEDAD. <br>
                MUCHAS GRACIAS.
            </div>
            <input type="hidden" name="csrfmiddlewaretoken" value="DIAb1o3OPgvpKGekm4yxczV0c4MDAaBPqdbZmtphcxbaa7kczFUP0x5XlWY5MKfL">
        </form>
