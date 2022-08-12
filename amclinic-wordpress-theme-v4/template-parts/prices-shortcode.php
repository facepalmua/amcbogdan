<?php
$atts = shortcode_atts(
    array(
        'amount' => '25px',
    ),
    $atts,
    'prices'
);
$amount = $atts['amount']

?>

<div class="prices__wrapper">
    <div class="price__item">
        <p class="price-title blue">CHINESE MEDICINE</p>

        <div class="price-content-wrapper">
            <div class="price-content">
                <div class="price__inner-item">
                    <p class="inner__title">ACUPUNCTURE + CONSULTATION</p>
                    <div class="inner__content_wrapper">
                        <p>Full consultation, including pulse and tongue diagnosis, will be followed by
                            Acupuncture and an optional plant-based prescription. Appointments
                            usually between 40-80 minutes.</p>
                    </div>
                    <ul class="inner__prices__list">
                        <li>first vist <span>£65</span></li>
                        <li>for a subsequent visit <span>£55</span></li>
                    </ul>
                </div>
            </div>
        </div>

        <div class="price-content-wrapper">
            <div class="price-content">
                <div class="price__inner-item">
                    <p class="inner__title">CONSULTATION</p>
                    <div class="inner__content_wrapper">
                        <p>Full consultation, including pulse and tongue diagnosis. Optional
                            plant-based prescription for purchase. Appointments usually last between
                            20-40 minutes.</p>
                    </div>
                    <ul class="inner__prices__list">
                        <li><span class="wo-padding">£35</span></li>
                    </ul>
                </div>
            </div>
        </div>

        <div class="price-content-wrapper">
            <div class="price-content">
                <div class="price__inner-item">
                    <p class="inner__title">ACUPUNCTURE - MUSCULOSKELETAL PAIN</p>
                    <div class="inner__content_wrapper">
                        <p>A highly-effective, multi-modality approach to musculoskeletal pain and
                            injury. Expert acupuncture with cupping, manipulation, advanced Pi/Fu
                            techniques in one session. Between 40-80 mins.</p>
                    </div>
                    <ul class="inner__prices__list">
                        <li><span class="wo-padding">£75</span></li>
                    </ul>
                </div>
            </div>
        </div>

        <div class="price-content-wrapper">
            <div class="price-content">
                <div class="price__inner-item">
                    <p class="inner__title">SPECIALIST FERTILITY CLINIC</p>
                    <div class="inner__content_wrapper">
                        <p>Specialised fertility treatment by world-renowned experts in the field.
                            Includes Acupuncture and a written plant-based prescription for purchase.</p>
                    </div>
                    <ul class="inner__prices__list">
                        <li>fertility clinic with acupuncture<span>£85</span></li>
                        <li>consultation only <span>£65</span></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="prices__wrapper">
    <div class="price__item">
        <p class="price-title orange">MASSAGE</p>

        <div class="price-content-wrapper">
            <div class="price-content">
                <div class="price__inner-item">
                    <p class="inner__title">BODY MASSAGE</p>
                    <div class="inner__content_wrapper">
                        <p>Expert body massage customised to your particular needs. All of our
                            therapists are fully qualified and hand picked for their massage skills.</p>
                        <p>Select from the following massage types or ask reception to assist you.</p>
                    </div>
                    <div class="prices__select--wrapper">
                        <ul class="inner__prices__list__titles">
                            <li>Deep Tissue</li>
                            <li>Chinese Tuina</li>
                            <li>Traditional Thai</li>
                            <li>Sports</li>
                            <li>Swedish or Aromatherapy</li>
                        </ul>
                        <ul class="inner__prices__list bordered">
                            <li>30 minutes — <span>£39</span></li>
                            <li>45 minutes — <span>£55</span></li>
                            <li>60 minutes — <span>£75</span></li>
                            <li>90 minutes — <span>£90</span></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        <div class="price-content-wrapper">
            <div class="price-content">
                <div class="price__inner-item">
                    <p class="inner__title">FOOT MASSAGE</p>
                    <div class="inner__content_wrapper">
                        <p>Experience the revitalising pleasure of a foot massage for 45 minutes.</p>
                    </div>
                    <ul class="inner__prices__list">
                        <li><span class="wo-padding">£55</span></li>
                    </ul>
                </div>
            </div>
        </div>

        <div class="price-content-wrapper">
            <div class="price-content">
                <div class="price__inner-item">
                    <p class="inner__title">HEAD MASSAGE</p>
                    <div class="inner__content_wrapper">
                        <p>Restorative massage focused on head, neck & shoulders for 30 minutes.</p>
                    </div>
                    <ul class="inner__prices__list">
                        <li><span class="wo-padding">£39</span></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="prices__wrapper">
    <div class="price__item">
        <p class="price-title purple">COSMETIC</p>

        <div class="price-content-wrapper">
            <div class="price-content">
                <div class="price__inner-item">
                    <p class="inner__title">BODY MASSAGE</p>
                    <div class="inner__content_wrapper">
                        <p>Expert Acupuncture for facial rejuvenation and anti-ageing for about
                            40 minutes.</p>
                    </div>
                    <ul class="inner__prices__list">
                        <li><span class="wo-padding">£65</span></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="prices__wrapper">
    <div class="price__item">
        <p class="price-title green">SUPPLEMENTARY</p>

        <div class="price-content-wrapper">
            <div class="price-content">
                <div class="price__inner-item">
                    <p class="inner__title">CUPPING THERAPY</p>
                    <div class="inner__content_wrapper">
                        <p>Traditional technique using suction cupping for pain relief and detox.
                            Included as part of Acupuncture for Musculoskeletal Pain. Addition to
                            other treatments.</p>
                    </div>
                    <ul class="inner__prices__list">
                        <li><span class="wo-padding">£20</span></li>
                    </ul>
                </div>
            </div>
        </div>

        <div class="price-content-wrapper">
            <div class="price-content">
                <div class="price__inner-item">
                    <p class="inner__title">PLANT-BASED CHINESE MEDICINE</p>
                    <div class="inner__content_wrapper">
                        <p>Fully Tailored Plant-Based Prescription (raw herbs or extracts).</p>
                    </div>
                    <ul class="inner__prices__list no-flex">
                        <li>per day <i>(approximately)</i><span>£9-10</span></li>
                        <li>per day per formulation <i>(approximately)</i><span>£2-4</span></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="prices__wrapper last-prices__wrapper">
    <div class="price__item">
        <p class="price-title white">
            <img src="<?php echo get_stylesheet_directory_uri() ?>/assets/images/header-logo-cropped.png" alt="">
            VALUE PACKAGES
        </p>

        <div class="price-content-wrapper">
            <div class="price-content">
                <div class="price__inner-item">
                    <p class="value_packages--title">Buy 6 sessions in advance for big savings.</p>
                    <ul class="value_packges--content">
                        <li>Mix and match treatments</li>
                        <li>Transferable - Give Treatments to Family & Friends</li>
                    </ul>
                    <div class="package__grid-wrapper">
                        <div>
                            <div class="package__grid--item">
                                <div>
                                    <p class="package__grid--item--title">
                                        PACKAGE 1
                                    </p>
                                    <p class="package__grid--item--description">
                                        (each treatment £32.50)
                                    </p>
                                </div>
                                <p class="package__grid--item--price">£195</p>
                            </div>
                            <div class="package__grid--item">
                                <div>
                                    <p class="package__grid--item--title">
                                        PACKAGE 2
                                    </p>
                                    <p class="package__grid--item--description">
                                        (each treatment £48.80)
                                    </p>
                                </div>
                                <p class="package__grid--item--price">£275</p>
                            </div>
                            <div class="package__grid--item">
                                <div>
                                    <p class="package__grid--item--title">
                                        PACKAGE 3
                                    </p>
                                    <p class="package__grid--item--description">
                                        (each treatment £58.30)
                                    </p>
                                </div>
                                <p class="package__grid--item--price">£350</p>
                            </div>
                            <div class="package__grid--item">
                                <div>
                                    <p class="package__grid--item--title">
                                        PACKAGE 4
                                    </p>
                                    <p class="package__grid--item--description">
                                        (each treatment £70.80)
                                    </p>
                                </div>
                                <p class="package__grid--item--price">£425</p>
                            </div>
                        </div>
                        <div class="package__grid__right--wrapper">
                            <div class="package__grid__right">
                                <p class="package__grid__right--title">
                                    How To Pick:
                                </p>
                                <p class="package__grid__right--description">
                                    Choose the package which
                                    includes treatments that you
                                    will use most often - this will
                                    save you the highest amount of money.
                                </p>
                            </div>
                            <div class="package__grid__right">
                                <p class="package__grid__right--title">
                                    Flexible:
                                </p>
                                <p class="package__grid__right--description">
                                    You can redeem your
                                    treatments for treatments in
                                    higher value packages by
                                    paying extra. You can redeem
                                    your treatments for treatments
                                    in lower value packages.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="price-content-wrapper">
            <div class="price-content">
                <div class="price__inner-item inner_price_table">
                    <div class="row">
                        <div class="col-md-6 col-md-offset-6">
                            <p class="table__package-title">Package</p>
                        </div>
                    </div>
                    <div class="prices-table__center-line">
                        <div class="row prices__table-headings-row">
                            <div class="col-md-6 col-sm-6 col-xs-6">
                                <p class="prices__table-title">
                                    TREATMENT TYPE
                                </p>
                            </div>
                            <div class="col-md-6 col-sm-6 col-xs-6">
                                <div class="prices__grid-labels">
                                    <p class="prices__table-title">1</p>
                                    <p class="prices__table-title">2</p>
                                    <p class="prices__table-title">3</p>
                                    <p class="prices__table-title">4</p>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 col-sm-6 col-xs-6">
                                <div class="prices__left-content">
                                    <p class="__title">Massage - 30 minutes</p>
                                    <p class="__description">(usual price £39)</p>
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-6 col-xs-6">
                                <div class="prices__grid-labels">
                                    <p class="prices__table-title"><span class="table-color-label green"></span></p>
                                    <p class="prices__table-title"><span class="table-color-label yellow"></span></p>
                                    <p class="prices__table-title"><span class="table-color-label yellow"></span></p>
                                    <p class="prices__table-title"><span class="table-color-label yellow"></span></p>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 col-sm-6 col-xs-6">
                                <div class="prices__left-content">
                                    <p class="__title">Head Massage</p>
                                    <p class="__description">(usual price £39)</p>
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-6 col-xs-6">
                                <div class="prices__grid-labels">
                                    <p class="prices__table-title"><span class="table-color-label green"></span></p>
                                    <p class="prices__table-title"><span class="table-color-label yellow"></span></p>
                                    <p class="prices__table-title"><span class="table-color-label yellow"></span></p>
                                    <p class="prices__table-title"><span class="table-color-label yellow"></span></p>
                                </div>
                            </div>

                        </div>
                        <hr class="custom-hr">
                        <div class="row">
                            <div class="col-md-6 col-sm-6 col-xs-6">
                                <div class="prices__left-content">
                                    <p class="__title">Acupuncture</p>
                                    <p class="__description">(usual price £55)</p>
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-6 col-xs-6">
                                <div class="prices__grid-labels">
                                    <p class="prices__table-title"><span class="table-color-label price">£15</span></span></p>
                                    <p class="prices__table-title"><span class="table-color-label green"></span></p>
                                    <p class="prices__table-title"><span class="table-color-label yellow"></span></p>
                                    <p class="prices__table-title"><span class="table-color-label yellow"></span></p>
                                </div>
                            </div>

                        </div>
                        <div class="row">
                            <div class="col-md-6 col-sm-6 col-xs-6">
                                <div class="prices__left-content">
                                    <p class="__title">Massage - 45 minutes</p>
                                    <p class="__description">(usual price £55)</p>
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-6 col-xs-6">
                                <div class="prices__grid-labels">
                                    <p class="prices__table-title"><span class="table-color-label price">£15</span></span></p>
                                    <p class="prices__table-title"><span class="table-color-label green"></span></p>
                                    <p class="prices__table-title"><span class="table-color-label yellow"></span></p>
                                    <p class="prices__table-title"><span class="table-color-label yellow"></span></p>
                                </div>
                            </div>

                        </div>
                        <div class="row">
                            <div class="col-md-6 col-sm-6 col-xs-6">
                                <div class="prices__left-content">
                                    <p class="__title">Foot Massage - 45 minutes</p>
                                    <p class="__description">(usual price £55)</p>
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-6 col-xs-6">
                                <div class="prices__grid-labels">
                                    <p class="prices__table-title"><span class="table-color-label price">£15</span></span></p>
                                    <p class="prices__table-title"><span class="table-color-label green"></span></p>
                                    <p class="prices__table-title"><span class="table-color-label yellow"></span></p>
                                    <p class="prices__table-title"><span class="table-color-label yellow"></span></p>
                                </div>
                            </div>

                        </div>
                        <div class="row">
                            <div class="col-md-6 col-sm-6 col-xs-6">
                                <div class="prices__left-content">
                                    <p class="__title">Cosmetic Acupuncture</p>
                                    <p class="__description">(usual price £65)</p>
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-6 col-xs-6">
                                <div class="prices__grid-labels">
                                    <p class="prices__table-title"><span class="table-color-label price">£25</span></span></p>
                                    <p class="prices__table-title"><span class="table-color-label green"></span></p>
                                    <p class="prices__table-title"><span class="table-color-label yellow"></span></p>
                                    <p class="prices__table-title"><span class="table-color-label yellow"></span></p>
                                </div>
                            </div>

                        </div>
                        <hr class="custom-hr">
                        <div class="row">
                            <div class="col-md-6 col-sm-6 col-xs-6">
                                <div class="prices__left-content">
                                    <p class="__title">Acupuncture - Musculoskeletal Pain</p>
                                    <p class="__description">(usual price £75)</p>
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-6 col-xs-6">
                                <div class="prices__grid-labels">
                                    <p class="prices__table-title"><span class="table-color-label price">£35</span></span></p>
                                    <p class="prices__table-title"><span class="table-color-label price">£20</span></span></p>
                                    <p class="prices__table-title"><span class="table-color-label green"></span></p>
                                    <p class="prices__table-title"><span class="table-color-label yellow"></span></p>
                                </div>
                            </div>

                        </div>
                        <div class="row">
                            <div class="col-md-6 col-sm-6 col-xs-6">
                                <div class="prices__left-content">
                                    <p class="__title">Massage - 60 minutes</p>
                                    <p class="__description">(usual price £75)</p>
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-6 col-xs-6">
                                <div class="prices__grid-labels">
                                    <p class="prices__table-title"><span class="table-color-label price">£35</span></span></p>
                                    <p class="prices__table-title"><span class="table-color-label price">£20</span></span></p>
                                    <p class="prices__table-title"><span class="table-color-label green"></span></p>
                                    <p class="prices__table-title"><span class="table-color-label yellow"></span></p>
                                </div>
                            </div>

                        </div>
                        <hr class="custom-hr">
                        <div class="row">
                            <div class="col-md-6 col-sm-6 col-xs-6">
                                <div class="prices__left-content">
                                    <p class="__title">Fertility Clinic with Acupuncture</p>
                                    <p class="__description">(usual price £85)</p>
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-6 col-xs-6">
                                <div class="prices__grid-labels">
                                    <p class="prices__table-title"><span class="table-color-label price">£45</span></span></p>
                                    <p class="prices__table-title"><span class="table-color-label price">£30</span></span></p>
                                    <p class="prices__table-title"><span class="table-color-label price">£10</span></span></p>
                                    <p class="prices__table-title"><span class="table-color-label green"></span></p>
                                </div>
                            </div>

                        </div>
                        <div class="row">
                            <div class="col-md-6 col-sm-6 col-xs-6">
                                <div class="prices__left-content">
                                    <p class="__title">Massage - 90 minutes</p>
                                    <p class="__description">(usual price £90)</p>
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-6 col-xs-6">
                                <div class="prices__grid-labels">
                                    <p class="prices__table-title"><span class="table-color-label price">£50</span></span></p>
                                    <p class="prices__table-title"><span class="table-color-label price">£35</span></span></p>
                                    <p class="prices__table-title"><span class="table-color-label price">£15</span></span></p>
                                    <p class="prices__table-title"><span class="table-color-label green"></span></p>
                                </div>
                            </div>

                        </div>
                    </div>
                    <div id="table-scroll" class="table-scroll">
                        <div class="table-wrap">
                            <table class="main-table">
                            <thead>
                                <tr>
                                    <th class="fixed-side prices__table-title">TREATMENT TYPE</th>
                                    <th class="prices__table-title">1</th>
                                    <th class="prices__table-title">2</th>
                                    <th class="prices__table-title">3</th>
                                    <th class="prices__table-title">4</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                <th class="fixed-side __title">Massage - 30 minutes <br> <p class="__description">(usual price £39)</p></th>
                                <td><span class="table-color-label green"></span></td>
                                <td><span class="table-color-label yellow"></span></td>
                                <td><span class="table-color-label yellow"></span></td>
                                <td><span class="table-color-label yellow"></span></td>
                                </tr>
                                <tr>
                                <th class="fixed-side __title">Head Massage <br> <p class="__description">(usual price £39)</p></th>
                                <td><span class="table-color-label green"></span></td>
                                <td><span class="table-color-label yellow"></span></td>
                                <td><span class="table-color-label yellow"></span></td>
                                <td><span class="table-color-label yellow"></span></td>
                                </tr>
                                <tr>
                                <th class="fixed-side __title">Acupuncture<br> <p class="__description">(usual price £55)</p></th>
                                <td><span class="table-color-label price">£15</span></td>
                                <td><span class="table-color-label green"></span></td>
                                <td><span class="table-color-label yellow"></span></td>
                                <td><span class="table-color-label yellow"></span></td>
                                </tr>
                                <tr>
                                <th class="fixed-side __title">Massage - 45 minutes<br> <p class="__description">(usual price £55)</p></th>
                                <td><span class="table-color-label price">£15</span></td>
                                <td><span class="table-color-label green"></span></td>
                                <td><span class="table-color-label yellow"></span></td>
                                <td><span class="table-color-label yellow"></span></td>
                                </tr>
                                <tr>
                                <th class="fixed-side __title">Foot Massage - 45 minutes<br> <p class="__description">(usual price £55)</p></th>
                                <td><span class="table-color-label price">£15</span></td>
                                <td><span class="table-color-label green"></span></td>
                                <td><span class="table-color-label yellow"></span></td>
                                <td><span class="table-color-label yellow"></span></td>
                                </tr>
                                <tr>
                                <th class="fixed-side __title">Cosmetic Acupuncture<br> <p class="__description">(usual price £65)</p></th>
                                <td><span class="table-color-label price">£25</span></td>
                                <td><span class="table-color-label green"></span></td>
                                <td><span class="table-color-label yellow"></span></td>
                                <td><span class="table-color-label yellow"></span></td>
                                </tr>
                                <tr>
                                <th class="fixed-side __title">Acupuncture - Musculoskeletal <br> Pain<br> <p class="__description">(usual price £75)</p></th>
                                <td><span class="table-color-label price">£35</span></td>
                                <td><span class="table-color-label price">£25</span></td>
                                <td><span class="table-color-label green"></span></td>
                                <td><span class="table-color-label yellow"></span></td>
                                </tr>
                                <tr>
                                <th class="fixed-side __title">Massage - 60 minutes <br> <p class="__description">(usual price £75)</p></th>
                                <td><span class="table-color-label price">£35</span></td>
                                <td><span class="table-color-label price">£25</span></td>
                                <td><span class="table-color-label green"></span></td>
                                <td><span class="table-color-label yellow"></span></td>
                                </tr>
                                <tr>
                                <th class="fixed-side __title">Fertility Clinic with Acupuncture<br> <p class="__description">(usual price £85)</p></th>
                                <td><span class="table-color-label price">£45</span></td>
                                <td><span class="table-color-label price">£30</span></td>
                                <td><span class="table-color-label price">£10</span></td>
                                <td><span class="table-color-label green"></span></td>
                                </tr>
                                <tr>
                                <th class="fixed-side __title">Massage - 90 minutes<br> <p class="__description">(usual price £90)</p></th>
                                <td><span class="table-color-label price">£50</span></td>
                                <td><span class="table-color-label price">£35</span></td>
                                <td><span class="table-color-label price">£15</span></td>
                                <td><span class="table-color-label green"></span></td>
                                </tr>
                            </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="price-table-labels__wrapper">
                    <div class="price-table-labels__wrapper__item">
                        <span class="table-color-label green"></span>
                        included in package
                    </div>
                    <div class="price-table-labels__wrapper__item">
                        <span class="table-color-label yellow"></span>
                        lower value treatments included in package
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="price-policy">
    <div class="price-content-wrapper">
        <div class="row">
            <div class="col-md-6">
                <p class="price-policy-title">CANCELLATION POLICY: </p>
                <p class="price-policy-content">AcuMedic has a strict cancellation
                    policy of 24 hours notice. There is
                    a late cancellation charge of £25
                    for any late cancellations or no-shows.</p>
            </div>
            <div class="col-md-6">
                <p class="price-policy-title">CHILDREN: </p>
                <p class="price-policy-content">50% discount on most full price
                    AcuMedic medical treatment for
                    children under 16.</p>
                <p class="price-disclaimer">*Prices subject to change without notice.</p>
            </div>
        </div>
    </div>
</div>


<?php if (!function_exists('prices_styles')) {
    function prices_styles()
    { ?>

<?php }
}
add_action('wp_footer', 'prices_styles', 100);
