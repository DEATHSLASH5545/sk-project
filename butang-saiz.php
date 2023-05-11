<script>

function ubahsaiz(gandaan) {
    let saiz = document.getElementById("saiz");
    let saiz_semasa = saiz.style.fontSize || 1;
    if(gandaan==2)
    {
        saiz.style.fontSize = "1em";
    }
    else
    {
        saiz.style.fontSize = ( parseFloat(saiz_semasa) + (gandaan * 0.2)) + "em";
    }
}
</script>

| ubah  saiz tulisan |
<input name='reSize1' type='button' value='reset' onclick="ubahsaiz(2)" />
<input name='reSize' type='button' value='&nbsp;+&nbsp;' onclick="ubahsaiz(1)" />
<input name='reSize2' type='button' value='&nbsp;+&nbsp;' onclick="ubahsaiz(-1)" />
|
<button onclick="window.print()">Cetak</button>