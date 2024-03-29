

<?php
//session_start();
?>


<!DOCTYPE html>
<html lang="hu">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DD Webshop</title>
    <link rel="stylesheet" href="../css/formatting.css"/>
    <link rel="icon" type="img/x-icon" href="../other_img/favico.ico"/>
</head>
<body>
<?php include_once('navbar.php')?>
<main id="itemContainer">
    <section class="item">
        <table>
            <tr>
                <th id="image_shovel"></th>
                <th id="info_shovel" style="text-shadow: 1px 1px darkgray;font-size: 22px;text-align: left; padding-top: 35px">Lapát</th>
            </tr>
            <tr>
                <td headers="image_shovel">
                    <img src="../items_img/shovel.png" alt="Lapát" style="height:120px;width:120px">
                </td>
                <td headers="info_shovel">
                    <p>A lapát egy kéziszerszám a föld ásására, mozgatására és növények átültetésére. Fából vagy fémből készül, lapos, lapos végű formájú, általában markolattal vagy nyéllel együtt értékesítik.</p>
                    <strong class="price">Ár: 5000 Ft</strong>
                    <br>
                    <br>
                    <button onclick="alert('Sikeres kosárba helyezés.')">Kosárba</button>
                </td>
            </tr>
        </table>
    </section>
    <section class="item">
        <table>
            <tr>
                <th id="image_axe"></th>
                <th id="info_axe" style="text-shadow: 1px 1px darkgray;font-size: 22px;text-align: left; padding-top: 35px">Balta</th>
            </tr>
            <tr>
                <td headers="image_axe">
                    <img src="../items_img/axe.png" alt="Balta" style="height:120px;width:120px">
                </td>
                <td headers="info_axe">
                    <p>A balta egy kéziszerszám, amelyet fakitermelésre, faaprításra és általános használatra terveztek. A pengéje általában acélból vagy más kemény anyagból készül, és egy erős, fa vagy műanyag nyélre van erősítve.</p>
                    <strong class="price">Ár: 8000 Ft</strong>
                    <br>
                    <br>
                    <button onclick="alert('Sikeres kosárba helyezés.')">Kosárba</button>
                </td>
            </tr>
        </table>
    </section>
    <section class="item">
        <table>
            <tr>
                <th id="image_can"></th>
                <th id="info_can" style="text-shadow: 1px 1px darkgray;font-size: 22px;text-align: left; padding-top: 35px">Locsolókanna</th>
            </tr>
            <tr>
                <td headers="image_can">
                    <img src="../items_img/can.png" alt="Locsolókanna" style="height:120px;width:120px">
                </td>
                <td headers="info_can">
                    <p>A locsolókanna egy hasznos kerti eszköz, amely lehetővé teszi a növények pontos öntözését. Általában műanyagból készül, és kézi pumpával rendelkezik, amely segítségével a víz könnyedén kijuttatható a kanna segítségével.</p>
                    <strong class="price">Ár: 1500 Ft</strong>
                    <br>
                    <br>
                    <button onclick="alert('Sikeres kosárba helyezés.')">Kosárba</button>
                </td>
            </tr>
        </table>
    </section>
    <section class="item">
        <table>
            <tr>
                <th id="image_fork"></th>
                <th id="info_fork" style="text-shadow: 1px 1px darkgray;font-size: 22px;text-align: left; padding-top: 35px">Villa</th>
            </tr>
            <tr>
                <td headers="image_fork">
                    <img src="../items_img/fork.png" alt="Kerti villa" style="height:120px;width:120px">
                </td>
                <td headers="info_fork">
                    <p>A kerti villa egy hasznos eszköz a talaj megmunkálásához, mint például az ásás, a szellőzés és a komposztkeverés. Általában acélból készül, és hosszú nyelű, fogazott fejjel rendelkezik.</p>
                    <strong class="price">Ár: 4000 Ft</strong>
                    <br>
                    <br>
                    <button onclick="alert('Sikeres kosárba helyezés.')">Kosárba</button>
                </td>
            </tr>
        </table>
    </section>
    <section class="item">
        <table>
            <tr>
                <th id="image_gloves"></th>
                <th id="info_gloves" style="text-shadow: 1px 1px darkgray;font-size: 22px;text-align: left; padding-top: 35px">Kerti kesztyű</th>
            </tr>
            <tr>
                <td headers="image_gloves">
                    <img src="../items_img/gloves.png" alt="Kerti kesztyű" style="height:120px;width:120px">
                </td>
                <td headers="info_gloves">
                    <p>A kerti kesztyű egy fontos eszköz a kertészkedés során, amely megvédi a kezét a sérülésektől és a piszkos munkától. Általában textilből vagy műanyagból készül, és különféle méretű és stílusú lehet.</p>
                    <strong class="price">Ár: 2000 Ft</strong>
                    <br>
                    <br>
                    <button onclick="alert('Sikeres kosárba helyezés.')">Kosárba</button>
                </td>
            </tr>
        </table>
    </section>
    <section class="item">
        <table>
            <tr>
                <th id="image_hoe"></th>
                <th id="info_hoe" style="text-shadow: 1px 1px darkgray;font-size: 22px;text-align: left; padding-top: 35px">Kapa</th>
            </tr>
            <tr>
                <td headers="image_hoe">
                    <img src="../items_img/hoe.png" alt="Kapa" style="height:120px;width:120px">
                </td>
                <td headers="info_hoe">
                    <p>A kapa egy erős és hatékony eszköz a talaj megmunkálására, mint például a gyomlálás és az ásás. Általában acélból készül, és egy hosszú, erős nyélre van erősítve.</p>
                    <strong class="price">Ár: 4500 Ft</strong>
                    <br>
                    <br>
                    <button onclick="alert('Sikeres kosárba helyezés.')">Kosárba</button>
                </td>
            </tr>
        </table>
    </section>
    <section class="item">
        <table>
            <tr>
                <th id="image_rake"></th>
                <th id="info_rake" style="text-shadow: 1px 1px darkgray;font-size: 22px;text-align: left; padding-top: 35px">Gereblye</th>
            </tr>
            <tr>
                <td headers="image_rake">
                    <img src="../items_img/rake.png" alt="Gereblye" style="height:120px;width:120px">
                </td>
                <td headers="info_rake">
                    <p>A gereblye egy kéziszerszám a kerti munkákhoz, mint például a fű és a levelek összegyűjtése vagy a talaj előkészítése vetéshez. Általában fa vagy műanyag nyélre van rögzítve, és fogai fémből vagy műanyagból készülnek, amelyek könnyen összeszedik az anyagokat.</p>
                    <strong class="price">Ár: 6000 Ft</strong>
                    <br>
                    <br>
                    <button onclick="alert('Sikeres kosárba helyezés.')">Kosárba</button>
                </td>
            </tr>
        </table>
    </section>
    <section class="item">
        <table>
            <tr>
                <th id="image_shears"></th>
                <th id="info_shears" style="text-shadow: 1px 1px darkgray;font-size: 22px;text-align: left; padding-top: 35px">Kerti olló</th>
            </tr>
            <tr>
                <td headers="image_shears">
                    <img src="../items_img/shears.png" alt="Kerti olló" style="height:120px;width:120px">
                </td>
                <td headers="info_shears">
                    <p>A kerti olló egy kéziszerszám a kerti munkákhoz, amelyet általában növények metszésére használnak, például a cserjék vagy virágok nyírására. Legtöbbször acél pengével és kényelmes fogóval készül, hogy könnyen és precízen lehessen vele dolgozni.</p>
                    <strong class="price">Ár: 3500 Ft</strong>
                    <br>
                    <br>
                    <button onclick="alert('Sikeres kosárba helyezés.')">Kosárba</button>
                </td>
            </tr>
        </table>
    </section>
    <section class="item">
        <table>
            <tr>
                <th id="image_spade"></th>
                <th id="info_spade" style="text-shadow: 1px 1px darkgray;font-size: 22px;text-align: left; padding-top: 35px">Ásó</th>
            </tr>
            <tr>
                <td headers="image_spade">
                    <img src="../items_img/spade.png" alt="Ásó" style="height:120px;width:120px">
                </td>
                <td headers="info_spade">
                    <p>Az ásó egy kéziszerszám a talaj ásására, ásásra és átültetésre. Általában kemény acélból készült, és markolattal vagy nyéllel van ellátva, hogy könnyen kezelhető legyen. A kerti munkák elengedhetetlen eszköze, amelynek segítségével kertjét megművelheti és javíthatja.</p>
                    <strong class="price">Ár: 7000 Ft</strong>
                    <br>
                    <br>
                    <button onclick="alert('Sikeres kosárba helyezés.')">Kosárba</button>
                </td>
            </tr>
        </table>
    </section>
</main>

</body>
</html>