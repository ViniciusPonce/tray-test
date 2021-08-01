/**
 * Transforms money string (9.999,9) to float
 *
 * @param {String} money
 *
 * @return {Number}
 */
function moneyToFloat(money) {
    return parseFloat(money.replace(/\./g, '').replace(',', '.'), 10);
}
/*@file utils.js
@brief Conjunto de funções para tratamento dos dados
@author Marcone Gledson de Almeida
@date 2008
*/

/*   @brief Converte uma string em formato moeda para float
@param valor(string) - o valor em moeda
@return valor(float) - o valor em float
*/
function converteMoedaFloat(valor){

    if(valor === ""){
        valor =  0;
    }else{
        valor = valor.replace(".","");
        valor = valor.replace(",",".");
        valor = parseFloat(valor);
    }
    return valor;

}

/*   @brief Converte um valor em formato float para uma string em formato moeda
   @param valor(float) - o valor float
   @return valor(string) - o valor em moeda
*/
function converteFloatMoeda(valor){
    var inteiro = null, decimal = null, c = null, j = null;
    var aux = new Array();
    valor = ""+valor;
    c = valor.indexOf(".",0);
    //encontrou o ponto na string
    if(c > 0){
        //separa as partes em inteiro e decimal
        inteiro = valor.substring(0,c);
        decimal = valor.substring(c+1,valor.length);
    }else{
        inteiro = valor;
    }

    //pega a parte inteiro de 3 em 3 partes
    for (j = inteiro.length, c = 0; j > 0; j-=3, c++){
        aux[c]=inteiro.substring(j-3,j);
    }

    //percorre a string acrescentando os pontos
    inteiro = "";
    for(c = aux.length-1; c >= 0; c--){
        inteiro += aux[c]+'.';
    }
    //retirando o ultimo ponto e finalizando a parte inteiro

    inteiro = inteiro.substring(0,inteiro.length-1);

    decimal = parseInt(decimal);
    if(isNaN(decimal)){
        decimal = "00";
    }else{
        decimal = ""+decimal;
        if(decimal.length === 1){
            decimal = decimal+"0";
        }
    }


    valor = "R$ "+inteiro+","+decimal;


    return valor;

}
