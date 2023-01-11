<section class="food_options text-center">
    <div class="container">

        <h2>Étel adatai</h2>

        <form method="POST" method="post" action="/desserts<?php esc($desserts["id"])?>/edit"
            enctype="multipart/form-data">
            <div class="row d-flex justify-content-around">
                <div class="col-xl-6 form-group">
                    <label for="Daily-offer">Étel neve</label>
                    <input name="desserts_name" id="desserts_name" value="<?php esc($desserts["desserts_name"])?>"
                        class="form-control" required />

                    <label for="Étel jellemzése">Étel jellemzése</label>
                    <input name="desserts_characterization" id="desserts_characterization"
                        value="<?php esc($desserts["desserts_characterization"])?>" class="form-control" required />

                    <label for="Étel jellemzése">Étel ára</label>
                    <input name="desserts_price" id="desserts_price" value="<?php esc($desserts["desserts_price"])?>"
                        class="form-control" required />
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