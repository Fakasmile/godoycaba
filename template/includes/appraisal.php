{% load staticfiles i18n %}

<div class="appraisal">
    <div class="header">
        <div class="title">TASACIONES</div>
        <div class="close" data-action="close"></div>
    </div>

    <form class="contact-form with-outline" action="{% url 'sendemail_appraisal' %}" method="post" novalidate data-contactform>
        <div class="fields">
            <div>
                <div class="field">
                    {{ appraisal_form.name }}
                </div>
                <div class="field">
                    {{ appraisal_form.email }}
                </div>
                <div class="field">
                    {{ appraisal_form.phone }}
                </div>
                <div class="field">
                    {{ appraisal_form.subject }}
                </div>
                <button type="submit" data-loading-text="{% trans 'Sending...' %}" tabindex="-1">
                    {% trans 'Submit' %}
                </button>
            </div>
            <div>
                <div class="field">
                    {{ appraisal_form.message }}
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
        {% csrf_token %}
    </form>
</div>
