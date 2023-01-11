<section class="food_options text-center mt-200">
    <div class="container">
        <h2 class="mb-100">Panzió képek rögzítése</h2>
        <?php if($imgFixed): ?>
        <div class="alert alert-success food_options__alert">
            <p class="food_options__alert__p">A képet rögzítettük!</p>
        </div>
        <?php endif ?>

        <div class="food_options__img-append-box">
            <form class="food_options__img-append-box__form" id="addPanzioImageSubmit" action="/addPanzioImageSubmit"
                method="post" enctype="multipart/form-data">
                <input class="food_options__img-append-box__form__input" type="file" name="panzioimage" id="panzioimage"
                    multiple accept=".jpg, .png, .gif" />
                <fieldset>
                    <button class="flex-c-m s1-txt1 size6 bg1 how-btn1 trans-04 m-lr-auto karaKrisz--link-formating"
                        name="submit" type="submit" id="contact-submit" data-submit="...Sending">Feltöltés</button>
                </fieldset>
            </form>
        </div>

    </div>

</section>