<!-- @author Guillaume Paoli -->
<div class="table-responsive">
    <table class="table table-bordered text-center border-dark border-2" id="HoraireModal">
        <thead>
        <tr>
            <th class="c6" scope="col"></th>
            <th class="c7" scope="col">Lundi</th>
            <th class="c7" scope="col">Mardi</th>
            <th class="c7" scope="col">Mercredi</th>
            <th class="c7" scope="col">Jeudi</th>
            <th class="c7" scope="col">Vendredi</th>
        </tr>
        </thead>
        <tbody>
        @for($min30=0; $min30<=19; $min30++)
            <tr id="horaireTH">
                <th>
                    <?php
                    $h = 0;
                    $m = 0;
                    $n = 0;
                    for($x = 0;$x<=$min30;$x++) {
                        if ($x == 0) {
                            $h = 8;
                            $m -= 3;
                        }
                        $m += 3;
                        if ($m == 6) {
                            $m = 0;
                            $h++;
                        }
                    }

                    $h2 = 0;
                    $m2 = 0;
                    $n2 = 0;
                    for($x2 = 0;$x2<=$min30;$x2++) {
                        if ($x2 == 0) {
                            $h2 = 8;
                        }
                        $m2 += 3;
                        if ($m2 == 6) {
                            $m2 = 0;
                            $h2++;
                        }
                    }
                    echo "$h:$m$n - $h2:$m2$n2";
                    ?>
                </th>
                <th info="{{$horaire->lundi[$min30]}}"></th>
                <th info="{{$horaire->mardi[$min30]}}"></th>
                <th info="{{$horaire->mercredi[$min30]}}"></th>
                <th info="{{$horaire->jeudi[$min30]}}"></th>
                <th info="{{$horaire->vendredi[$min30]}}"></th>
            </tr>
        @endfor
        </tbody>
    </table>
</div>

