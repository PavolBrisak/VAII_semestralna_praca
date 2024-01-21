<!DOCTYPE html>
<html lang="en">
<head>
    @include('meta-info')
    <title>Reklamácie</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <link rel="stylesheet" href="{{url('styles/hlavna-stranka.css')}}">
    <link rel="stylesheet" href="{{url('styles/reklamacie.css')}}">
    <script src="{{url('js/main.js')}}"></script>
</head>
<body>
@include('header')
@include('search')
@include('navigation-bar')
<div class="velky-nadpis">
    <p>Reklamácie</p>
</div>
<div class="content">
    <ul>
        <li><h1>Reklamácie a Záruka na Náušnice</h1></li>

        <li>Vážený zákazník,</li>

        <li>Vaša spokojnosť s našimi náušnicami je našou najvyššou prioritou. V prípade, že ste objednali náušnice a
            narazili na akékoľvek problémy alebo chcete uplatniť reklamáciu, sme tu, aby sme vám pomohli.</li>

        <li><h2>1. Reklamácie v rámci Záruky</h2></li>

        <li>Garantujeme kvalitu našich výrobkov a v rámci našej záruky na náušnice môžete uplatniť reklamáciu v prípade,
            že:</li>

        <li>Náušnice majú výrobné chyby alebo poškodenia pri doručení.</li>
        <li>Náušnice nevyhovujú popisu na našej stránke.</li>
        <li>Náušnice majú praskliny alebo iné viditeľné nedostatky.</li>
        <li>V takýchto prípadoch vám radi poskytneme náhradu alebo výmenu výrobku. Stačí nás kontaktovať e-mailom alebo
            cez kontaktný formulár na našej stránke. Ak ste uplatnili reklamáciu, prosím priložte fotografie problému,
            čo nám pomôže rýchlejšie vám pomôcť.</li>

        <li><h2>2. Reklamácie mimo Záruky</h2></li>

        <li>Mimo obdobia záruky vám stále chceme pomôcť. Ak máte problémy s našimi náušnicami, neváhajte nás
            kontaktovať. Naša ústretová a skúsená zákaznícka podpora vám poskytne rady a informácie o tom, ako môžeme
            pomôcť vyriešiť vaše problémy. Aj mimo záruky sme tu pre vás.</li>

        <li>Naším cieľom je, aby ste mali pozitívny nákupný zážitok, a sme pripravení spraviť všetko pre to, aby sme
            vám pomohli vyriešiť vaše obavy.</li>

        <li>Ďakujeme, že ste si vybrali naše náušnice a dúfame, že budete s našimi výrobkami spokojní. Ak máte akékoľvek
            ďalšie otázky ohľadom reklamácií alebo našich výrobkov, neváhajte nás kontaktovať. Vaša spokojnosť je našou
            prioritu.</li>
    </ul>
</div>
@include('footer')
</body>
</html>
