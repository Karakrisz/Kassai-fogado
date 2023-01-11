<section class="food_options text-center">
    <div class="container">

        <?php if ($foodUpdateFixed): ?>
        <div class="alert alert-success food_options__alert">
            <p class="food_options__alert__p">Az étel módosítva!</p>
        </div>
        <?php endif?>

        <h2>Étel adatai</h2>

        <form method="POST" method="post" action="/friday<?php esc($friday["id"])?>/edit" enctype="multipart/form-data">
            <div class="row d-flex justify-content-around">
                <div class="col-xl-6 form-group">
                    <label for="Daily-offer">Étel neve</label>
                    <input name="friday_name" id="friday_name" value="<?php esc($friday["friday_name"])?>"
                        class="form-control" required />

                    <label for="Étel jellemzése">Étel jellemzése</label>
                    <input name="friday_characterization" id="friday_characterization"
                        value="<?php esc($friday["friday_characterization"])?>" class="form-control" required />
                </div>
            </div>
            <div class="alert alert-success inserted-alert-success">
                <p id="inserted">
                </p>
            </div>
            <button type="submit"
                class="btn flex-c-m s1-txt1 size6 bg1 how-btn1 trans-04 m-lr-auto karaKrisz--link-formating">Rögzítés</button>
        </form>
    </div>
</section>