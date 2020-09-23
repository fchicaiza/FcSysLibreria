function Autores(naut, ide, taut, action) {
    this.action = action;
    this.naut = naut;
    this.ide = ide;
    this.taut = taut;


}
Autores.prototype.AddAutor = function () {
    console.log(this.naut + " " + this.ide + " " + this.taut);
    $.ajax({
        type: 'POST',
        url: this.action,
        data: {naut: this.naut, ide: this.ide, taut: this.taut},
        success: function (response) {
            if (response == 1) {
                bootbox.alert("Autor agregado");
                 $('#divtabla').load('tablaautores.php');
              
            } else {
                bootbox.alert("Autor no agregado");
            }
        }
    });
}