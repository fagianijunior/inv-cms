/* //////////////////////
		VARIABLES
////////////////////// */
//POSICOES E INFORMACOES PARA OS TICKERS DENTRO DO CAMPO
const cores = [
	"#753CFF",
	"#5500FF",
	"#000"
	];
const posicoes_por_estrategia_mob = {
	defensivo: [
		//ataque
		{top: "10%", left: "40.5%", color: cores[0], posicao: "ataque", ticker: "TICKER"},

		//meio-campo
		{top: "39%", left: "10%", color: cores[1], posicao: "meio", ticker: "TICKER"},
		{top: "30%", left: "40.5%", color: cores[1], posicao: "meio", ticker: "TICKER"},
		{top: "39%", left: "69%", color: cores[1], posicao: "meio", ticker: "TICKER"},
		{top: "51%", left: "27%", color: cores[1], posicao: "meio", ticker: "TICKER"},
		{top: "51%", left: "53%", color: cores[1], posicao: "meio", ticker: "TICKER"},

		//defesa
		{top: "70%", left: "6%", color: cores[2], posicao: "defesa", ticker: "TICKER"},
		{top: "79%", left: "27%", color: cores[2], posicao: "defesa", ticker: "TICKER"},
		{top: "79%", left: "53%", color: cores[2], posicao: "defesa", ticker: "TICKER"},
		{top: "70%", left: "75%", color: cores[2], posicao: "defesa", ticker: "TICKER"},
	],
	equilibrado: [
		//ataque
		{top: "10%", left: "15%", color: cores[0], posicao: "ataque", ticker: "TICKER"},
		{top: "10%", left: "67%", color: cores[0], posicao: "ataque", ticker: "TICKER"},

		//meio-campo
		{top: "42%", left: "10%", color: cores[1], posicao: "meio", ticker: "TICKER"},
		{top: "35%", left: "40.5%", color: cores[1], posicao: "meio", ticker: "TICKER"},
		{top: "42%", left: "69%", color: cores[1], posicao: "meio", ticker: "TICKER"},
		{top: "51%", left: "40.5%", color: cores[1], posicao: "meio", ticker: "TICKER"},

		//defesa
		{top: "70%", left: "6%", color: cores[2], posicao: "defesa", ticker: "TICKER"},
		{top: "79%", left: "27%", color: cores[2], posicao: "defesa", ticker: "TICKER"},
		{top: "79%", left: "53%", color: cores[2], posicao: "defesa", ticker: "TICKER"},
		{top: "70%", left: "75%", color: cores[2], posicao: "defesa", ticker: "TICKER"},
	],
	ousado: [
		//ataque
		{top: "15%", left: "11%", color: cores[0], posicao: "ataque", ticker: "TICKER"},
		{top: "7%", left: "39%", color: cores[0], posicao: "ataque", ticker: "TICKER"},
		{top: "15%", left: "66%", color: cores[0], posicao: "ataque", ticker: "TICKER"},

		//meio-campo
		{top: "36%", left: "10%", color: cores[1], posicao: "meio", ticker: "TICKER"},
		{top: "47%", left: "39.5%", color: cores[1], posicao: "meio", ticker: "TICKER"},
		{top: "36%", left: "72%", color: cores[1], posicao: "meio", ticker: "TICKER"},

		//defesa
		{top: "70%", left: "6%", color: cores[2], posicao: "defesa", ticker: "TICKER"},
		{top: "79%", left: "27%", color: cores[2], posicao: "defesa", ticker: "TICKER"},
		{top: "79%", left: "53%", color: cores[2], posicao: "defesa", ticker: "TICKER"},
		{top: "70%", left: "75%", color: cores[2], posicao: "defesa", ticker: "TICKER"},
	]
};


const posicoes_por_estrategia_desk = {
	defensivo: [
		//ataque
		{top: "46%", left: "81%", color: cores[0], posicao: "ataque", ticker: "TICKER"},

		//meio-campo
		{top: "10%", left: "53%", color: cores[1], posicao: "meio", ticker: "TICKER"},
		{top: "46%", left: "58%", color: cores[1], posicao: "meio", ticker: "TICKER"},
		{top: "79%", left: "53%", color: cores[1], posicao: "meio", ticker: "TICKER"},
		{top: "29%", left: "39%", color: cores[1], posicao: "meio", ticker: "TICKER"},
		{top: "62%", left: "39%", color: cores[1], posicao: "meio", ticker: "TICKER"},

		//defesa
		{top: "10%", left: "20%", color: cores[2], posicao: "defesa", ticker: "TICKER"},
		{top: "29%", left: "6%", color: cores[2], posicao: "defesa", ticker: "TICKER"},
		{top: "62%", left: "6%", color: cores[2], posicao: "defesa", ticker: "TICKER"},
		{top: "79%", left: "20%", color: cores[2], posicao: "defesa", ticker: "TICKER"},
	],
	equilibrado: [
		//ataque
		{top: "29%", left: "81%", color: cores[0], posicao: "ataque", ticker: "TICKER"},
		{top: "62%", left: "81%", color: cores[0], posicao: "ataque", ticker: "TICKER"},

		//meio-campo
		{top: "10%", left: "53%", color: cores[1], posicao: "meio", ticker: "TICKER"},
		{top: "79%", left: "53%", color: cores[1], posicao: "meio", ticker: "TICKER"},
		{top: "29%", left: "39%", color: cores[1], posicao: "meio", ticker: "TICKER"},
		{top: "62%", left: "39%", color: cores[1], posicao: "meio", ticker: "TICKER"},

		//defesa
		{top: "10%", left: "20%", color: cores[2], posicao: "defesa", ticker: "TICKER"},
		{top: "29%", left: "6%", color: cores[2], posicao: "defesa", ticker: "TICKER"},
		{top: "62%", left: "6%", color: cores[2], posicao: "defesa", ticker: "TICKER"},
		{top: "79%", left: "20%", color: cores[2], posicao: "defesa", ticker: "TICKER"},
	],
	ousado: [
		//ataque
		{top: "10%", left: "75%", color: cores[0], posicao: "ataque", ticker: "TICKER"},
		{top: "46%", left: "81%", color: cores[0], posicao: "ataque", ticker: "TICKER"},
		{top: "79%", left: "75%", color: cores[0], posicao: "ataque", ticker: "TICKER"},

		//meio-campo
		{top: "21%", left: "51%", color: cores[1], posicao: "meio", ticker: "TICKER"},
		{top: "46%", left: "39%", color: cores[1], posicao: "meio", ticker: "TICKER"},
		{top: "71%", left: "51%", color: cores[1], posicao: "meio", ticker: "TICKER"},

		//defesa
		{top: "10%", left: "20%", color: cores[2], posicao: "defesa", ticker: "TICKER"},
		{top: "29%", left: "6%", color: cores[2], posicao: "defesa", ticker: "TICKER"},
		{top: "62%", left: "6%", color: cores[2], posicao: "defesa", ticker: "TICKER"},
		{top: "79%", left: "20%", color: cores[2], posicao: "defesa", ticker: "TICKER"},
	]
};
const estrategia_por_optionNumber = [
	"defensivo",
	"equilibrado",
	"ousado"
];
const limites_por_estrategia = {
	"defensivo": {
		ataque: 1,
		meio: 5,
		defesa: 4
	},
	"equilibrado": {
		ataque: 2,
		meio: 4,
		defesa: 4
	},
	"ousado": {
		ataque: 3,
		meio: 3,
		defesa: 4
	}
};
var errorsList_campo = [];
var errorsList_accordeon = [];
var estrategia_selecionada = "defensivo";

// var _DATA : moved to page-simulador-copa.php

var lista_de_jogadores_selecionados = {
	ataque: [],
	meio: [],
	defesa: [],
	count: 0
}
var checkpoint_scroll_accordeon_select = 0;



/* //////////////////////
		FUNCTIONS
////////////////////// */

//Cria os tickers no campo
function criaTickers_campo(){
	for(var i = 0; i < 10; i++){
		var jogador = checkif_size_above_threshold_ShowHorizontal() ? 
									posicoes_por_estrategia_desk[estrategia_selecionada][i] : 
									posicoes_por_estrategia_mob[estrategia_selecionada][i];

		var ticker = jQuery("<div class='ticker_campo'"
								+ "style='top:" + jogador.top + ";left:" + jogador.left + ";border-color:" + jogador.color + ";color:" + jogador.color + ";' "
								+ "posicao='" + jogador.posicao + "'"
							+ ">" 
								+ jogador.ticker
							+ "</div>");
		jQuery(".mvp-main-box .simulador-campo").append(ticker);
	}
}
//Modifica todos os tickers no campo atraves de uma lista de jogadores
function modificaTodosTickers_campo(jogadores){
	var _posicoes = {
		ordem: ["ataque", "meio", "defesa"],
		current: 0,
		current_count: 0
	};
	jogadores.forEach((e,i)=>{
		var currrent_pos = _posicoes.ordem[_posicoes.current];
		var current_limit = limites_por_estrategia[estrategia_selecionada][currrent_pos];
		if(_posicoes.current_count > current_limit-1){
			_posicoes.current++;
			_posicoes.current_count = 0;
			currrent_pos = _posicoes.ordem[_posicoes.current];
		}
		lista_de_jogadores_selecionados[currrent_pos].push(e);
		lista_de_jogadores_selecionados.count++;
		_posicoes.current_count++;
	});
	jQuery(".mvp-main-box .ticker_campo").each((i,e)=>{
		if(jogadores.length > i){
			jQuery(e).html(jogadores[i]);
		}
	});
}
function removeTodosTickers_campo(){
	jQuery(".mvp-main-box .simulador-campo .ticker_campo").remove();
}
function addClickToTickers_campo(){
	jQuery(".mvp-main-box .ticker_campo").click(show_select_do_campo);
	jQuery(".mvp-main-box .simulador-campo-select-bg").click(hide_select_do_campo);
}
function removeTicker_campo(ticker_to_remove){
	jQuery(".mvp-main-box .simulador-campo .ticker_campo").each((i,e) => {
		if(jQuery(e).html().toLowerCase() == ticker_to_remove.toLowerCase()){
			jQuery(e).html('TICKER');
		}
	});
}
function changeTicker_campo(novo_ticker, posicao){
	var limites = limites_por_estrategia[estrategia_selecionada];
	var startFrom = 0;
	var size = 0;
	for(const key in limites){
		if(key == posicao){
			size = limites[key];
			break;
		}else{
			startFrom += limites[key];
		}
	}
	var tickers_HTML = jQuery(".mvp-main-box .simulador-campo .ticker_campo");
	for (var i = 0; i < tickers_HTML.length; i++) {
		if(i >= startFrom && i < (startFrom + size)){
			if(jQuery(tickers_HTML[i]).html() == "TICKER"){
				jQuery(tickers_HTML[i]).html(novo_ticker);
				return;
			}
		}
	};
}




//FUNCOES PARA O SELECT DENTRO DO CAMPO DE FUTEBOL
function show_select_do_campo(e){
	var tickerClicado = jQuery(e.originalEvent.target);
	var tickerClicado_posicao = tickerClicado.attr("posicao");
	addEmpresas_select_do_campo(tickerClicado_posicao, _DATA[tickerClicado_posicao]);
	jQuery(".mvp-main-box .simulador-campo-select-bg").css({display:"block"});
	jQuery(".mvp-main-box .simulador-campo-select-bg").click(hide_select_do_campo);
	jQuery(".mvp-main-box .simulador-campo-select-holder").stop().slideDown(150);
	jQuery(".mvp-main-box .simulador-campo-select-holder").css({zIndex: 11, position: "relative"});
	jQuery(".mvp-main-box .simulador-campo .close-select").css({display:"block"});
	jQuery(".mvp-main-box .simulador-campo .close-select").click(hide_select_do_campo);
	setTimeout(()=>{
		startSearchbox_select_do_campo(tickerClicado_posicao);
	}, 200);
}
function hide_select_do_campo(){
	jQuery(".mvp-main-box .simulador-campo-select-bg").css({display:"none"});
	jQuery(".mvp-main-box .simulador-campo .close-select").css({display:"none"});
	jQuery(".mvp-main-box .simulador-campo-select-holder").stop().slideUp(100);
	jQuery(".mvp-main-box .simulador-campo-select-holder").css({zIndex: 1, position: "relative"});
}
//Adiciona empresas a lista de select do campo
function addEmpresas_select_do_campo(posicao, empresas, isSearch=false){
	jQuery(".mvp-main-box .simulador-campo > .simulador-campo-select-holder .simulador-campo-result").remove();
	if(empresas && empresas.length > 0){
		if(isSearch){
			var separator = jQuery("<div class='simulador-campo-result separator'>RESULTADO:</div>");
			jQuery(".mvp-main-box .simulador-campo > .simulador-campo-select-holder").append(separator);
		}
		jQuery(".mvp-main-box .simulador-campo > .simulador-campo-select-holder").attr("posicao", posicao);
		var selected_not_in_search = copyArray(lista_de_jogadores_selecionados[posicao]);
		for (var i = 0; i < empresas.length; i++) {

			var option = construtor_itemEmpresa(empresas[i].id, 
												empresas[i].ticker,
												empresas[i].nome,
												isEmpresaSelected(empresas[i].ticker));

			jQuery(".mvp-main-box .simulador-campo > .simulador-campo-select-holder").append(option);
			if(selected_not_in_search.includes(empresas[i].ticker)) selected_not_in_search.splice(selected_not_in_search.indexOf(empresas[i].ticker),1);
		}
		if(selected_not_in_search.length > 0){
			var separator = jQuery("<div class='simulador-campo-result separator'>EMPRESAS JÁ SELECIONADAS:</div>");
			jQuery(".mvp-main-box .simulador-campo > .simulador-campo-select-holder").append(separator);
			for (var i = 0; i < selected_not_in_search.length; i++) {
				var empresa;
				for (var j = 0; j < _DATA[posicao].length; j++) {
					if(_DATA[posicao][j].ticker == selected_not_in_search[i]) empresa = _DATA[posicao][j];
				}
				var option = construtor_itemEmpresa(empresa.id, 
													empresa.ticker, 
													empresa.nome, 
													true);

				jQuery(".mvp-main-box .simulador-campo > .simulador-campo-select-holder").append(option);
			}
		}
	}
	addClickToEmpresas_select_do_campo();
}
function addClickToEmpresas_select_do_campo(){
	jQuery(".mvp-main-box .simulador-campo > .simulador-campo-select-holder .simulador-campo-result").click((e)=>{
		var clicado = jQuery(e.originalEvent.srcElement);
		if(clicado.hasClass("separator")) return;
		var tentativa = 0;
		while(!clicado.hasClass("simulador-campo-result")){
			clicado = clicado.parent();
			tentativa++;
			if(tentativa >= 10) return null;
		}
		var posicao = clicado.parent().attr("posicao");

		var clicado_bt = clicado.find(".select-button")[0];
		if(jQuery(clicado_bt).hasClass("selected")){
			lista_de_jogadores_selecionados[posicao].splice(lista_de_jogadores_selecionados[posicao].indexOf(clicado.attr("my_ticker")),1);
			lista_de_jogadores_selecionados.count--;
			jQuery(clicado_bt).removeClass("selected");
			clearAllErrorTextOn_select_do_campo();
			removeTicker_campo(clicado.attr("my_ticker"));
			refresh_area_sua_selecao();
			refresh_grafico();
		}else{
			if(lista_de_jogadores_selecionados[posicao].length >= limites_por_estrategia[estrategia_selecionada][posicao]){
				addErrorTextTo_select_do_campo(clicado, "Você já selecionou o limite de jogadores para o " + (posicao.charAt(0).toUpperCase() + posicao.slice(1)) + ".");
			}else{
				lista_de_jogadores_selecionados[posicao].push(jQuery(clicado).attr("my_ticker"));
				lista_de_jogadores_selecionados.count++;
				jQuery(clicado_bt).addClass("selected");
				changeTicker_campo(jQuery(clicado).attr("my_ticker"), posicao);

				//Salva no cookie e abre areas de desempenho e selecao
				if(lista_de_jogadores_selecionados.count == 10){
					var jogadores = [];
					var ordem = ["ataque", "meio", "defesa"];
					for (var i = 0; i < ordem.length; i++) {
						for (var j = 0; j < lista_de_jogadores_selecionados[ordem[i]].length; j++) {
							jogadores.push(lista_de_jogadores_selecionados[ordem[i]][j]);
						}
					}
					var cookie_obj = {
						jogadores: jogadores,
						estrategia: estrategia_selecionada
					};
					Cookies.set('selecao_usuario', JSON.stringify(cookie_obj), { expires: 1 });


					var desempenho_panel = jQuery(".guias__container .desempenho_box .panel");
					desempenho_panel.addClass('open');
					desempenho_panel.slideDown(300,"swing", null);
					if(!checkif_size_above_threshold_ShowHorizontal()) jQuery(".guias__container .desempenho_box .accordion").toggleClass("active");


					var suaselecao_panel = jQuery(".container_sua_selecao .panel");
					suaselecao_panel.addClass('open');
					suaselecao_panel.slideDown(300,"swing", null);
					jQuery(".container_sua_selecao .accordion").toggleClass("active");
				}
				refresh_area_sua_selecao();
				refresh_grafico();
			}
		}
	});
}


//Funcoes de ajuda para o controle das mensagens de erro do select do campo
function addErrorTextTo_select_do_campo(appendTo, text){
	clearAllErrorTextOn_select_do_campo();
	jQuery(appendTo).append(jQuery("<p class='select-alert'>" + text + "</p>"));
	errorsList_campo.push(appendTo);
}
function clearAllErrorTextOn_select_do_campo(){
	if(errorsList_campo && errorsList_campo.length && errorsList_campo.length > 0){
		for (var i = 0; i < errorsList_campo.length; i++) {
			jQuery(errorsList_campo[i].find(".select-alert")[0]).remove();
		}
	}
	errorsList_campo = [];
}
function startSearchbox_select_do_campo(posicao){
	var searchBox = jQuery(".mvp-main-box .simulador-campo > .simulador-campo-select-holder .simulador-campo-search input");
	searchBox.val('');
	var search = function(e){
		jQuery(e.target).val((jQuery(e.target).val()).replace(/[^\w\s]/gi, '').replace("  ", " ").toLowerCase());
		var value = jQuery(e.target).val().replace(/[^\w\s]/gi, '').toLowerCase();
		value = value.replace("  ", " ");
		if(!value){
			addEmpresas_select_do_campo(posicao, _DATA[posicao]);
			return;
		}
		var filtered_DATA = [];
		for (var i = 0; i < _DATA[posicao].length; i++) {
			if(_DATA[posicao][i].nome.replace(/[^\w\s]/gi, '').toLowerCase().includes(value.toLowerCase())
			|| _DATA[posicao][i].ticker.replace(/[^\w\s]/gi, '').toLowerCase().includes(value.toLowerCase())){
				filtered_DATA.push({
					id: _DATA[posicao][i].id,
					nome: _DATA[posicao][i].nome,
					ticker: _DATA[posicao][i].ticker,
				});
			}
		}
		if(filtered_DATA.length > 0){
			addEmpresas_select_do_campo(posicao, filtered_DATA.sort((a, b) => a.nome.localeCompare(b.nome)), true);
		}else{
			jQuery(".mvp-main-box .simulador-campo > .simulador-campo-select-holder .simulador-campo-result").remove();
			var separator = jQuery("<div class='simulador-campo-result separator'>Resultado não encontrado</div>");
			jQuery(".mvp-main-box .simulador-campo > .simulador-campo-select-holder").append(separator);
		}
	};
	searchBox.on("input", search);
}




function show_select_do_accordeon(e){
	jQuery(".selecao_list .simulador-campo-select-holder").remove();
	var parent = jQuery(e.target);
	var element;
	var tentativa = 0;
	while(!parent.hasClass('selecao_item') && tentativa < 10){
		if(!element && parent.hasClass('select_inside')) {
			element = parent;
		}
		parent = parent.parent();
		tentativa++;
	}
	var tickerClicado_posicao = element.attr("_posicao");
	var tickerClicado_ticker = element.attr("_ticker");

	var holder = jQuery('<div class="simulador-campo-select-holder" _attached="' + tickerClicado_ticker + '" _posicao="' + tickerClicado_posicao + '">'
							+ '<div class="close_select_accordeon" onclick="hide_select_do_accordeon()"><i class="fa fa-times" aria-hidden="true"></i></div>'
							+ '<div class="simulador-campo-select">'
								+ '<div class="simulador-campo-search">'
									+ '<input type="text" name="search-empresas-simulador" class="simulador-campo-search-input" placeholder="Busque pela empresa"/>'
								+ '</div>'
							+'</div>'
						+'</div>');
	parent.after(holder);

	addEmpresas_select_do_accordeon(tickerClicado_posicao, _DATA[tickerClicado_posicao], false, holder);
	jQuery(".selecao_list .simulador-campo-select-bg").css({display:"block"});
	jQuery(".selecao_list .simulador-campo-select-bg").click(hide_select_do_accordeon);
	jQuery(".selecao_list .simulador-campo-select-holder").stop().slideDown(150);
	jQuery(".selecao_list .simulador-campo-select-holder").css({zIndex: 11, position: "relative"});
	setTimeout(()=>{
		startSearchbox_select_do_accordeon(tickerClicado_posicao, holder);
	}, 200);
}

function hide_select_do_accordeon() {
	jQuery(".selecao_list .simulador-campo-select-bg").css({display:"none"});
	jQuery(".selecao_list .simulador-campo-select-holder").stop().slideUp(100);
	jQuery(".selecao_list .simulador-campo-select-holder .simulador-campo-result").remove();
}





//Adiciona empresas a lista de select do acordeon
function addEmpresas_select_do_accordeon(posicao_estrategia, empresas, isSearch=false, holder){
	var empresa_list_holder = holder.find(".simulador-campo-select");
	jQuery(".guias__container .simulador-campo-select-holder .simulador-campo-result").remove();
	if(empresas && empresas.length > 0){
		if(isSearch){
			var separator = jQuery("<div class='simulador-campo-result separator'>RESULTADO:</div>");
			empresa_list_holder.append(separator);
		}
		holder.attr("posicao", posicao_estrategia);
		var selected_not_in_search = copyArray(lista_de_jogadores_selecionados[posicao_estrategia]);
		for (var i = 0; i < empresas.length; i++) {
			var option = construtor_itemEmpresa(empresas[i].id, 
												empresas[i].ticker,
												empresas[i].nome,
												isEmpresaSelected(empresas[i].ticker));

			empresa_list_holder.append(option);
			if(selected_not_in_search.includes(empresas[i].ticker)) selected_not_in_search.splice(selected_not_in_search.indexOf(empresas[i].ticker),1);
		}
		if(selected_not_in_search.length > 0){
			var separator = jQuery("<div class='simulador-campo-result separator'>EMPRESAS JÁ SELECIONADAS:</div>");
			empresa_list_holder.append(separator);
			for (var i = 0; i < selected_not_in_search.length; i++) {
				var empresa;
				for (var j = 0; j < _DATA[posicao_estrategia].length; j++) {
					if(_DATA[posicao_estrategia][j].ticker == selected_not_in_search[i]) empresa = _DATA[posicao_estrategia][j];
				}
				var option = construtor_itemEmpresa(empresa.id, 
													empresa.ticker, 
													empresa.nome, 
													true);

				empresa_list_holder.append(option);
			}
		}
	}
	addClickToEmpresas_select_do_accordeon();
}


function addClickToEmpresas_select_do_accordeon(){
	jQuery(".selecao_list .simulador-campo-select-holder .simulador-campo-result").click((e)=>{
		var holder = jQuery(".selecao_list .simulador-campo-select-holder");
		if(holder){
			checkpoint_scroll_accordeon_select = holder.find(".simulador-campo-select").scrollTop();
		}

		var clicado = jQuery(e.originalEvent.srcElement);
		if(clicado.hasClass("separator")) return;
		var tentativa = 0;
		while(!clicado.hasClass("simulador-campo-result")){
			clicado = clicado.parent();
			tentativa++;
			if(tentativa >= 20) return null;
		}

		var posicao = clicado.parent().parent().attr("posicao");
		var clicado_bt = clicado.find(".select-button")[0];

		if(jQuery(clicado_bt).hasClass("selected")){
			lista_de_jogadores_selecionados[posicao].splice(lista_de_jogadores_selecionados[posicao].indexOf(clicado.attr("my_ticker")),1);
			lista_de_jogadores_selecionados.count--;
			jQuery(clicado_bt).removeClass("selected");
			clearAllErrorTextOn_select_do_accordeon();
			removeTicker_campo(clicado.attr("my_ticker"));
			refresh_area_sua_selecao();
			refresh_grafico();
		}else{
			if(lista_de_jogadores_selecionados[posicao].length >= limites_por_estrategia[estrategia_selecionada][posicao]){
				addErrorTextTo_select_do_accordeon(clicado, "Você já selecionou o limite de jogadores para o " + (posicao.charAt(0).toUpperCase() + posicao.slice(1)) + ".");
			}else{
				lista_de_jogadores_selecionados[posicao].push(jQuery(clicado).attr("my_ticker"));
				lista_de_jogadores_selecionados.count++;
				jQuery(clicado_bt).addClass("selected");
				changeTicker_campo(jQuery(clicado).attr("my_ticker"), posicao);

				//Salva no cookie e abre areas de desempenho e selecao
				if(lista_de_jogadores_selecionados.count == 10){
					var jogadores = [];
					var ordem = ["ataque", "meio", "defesa"];
					for (var i = 0; i < ordem.length; i++) {
						for (var j = 0; j < lista_de_jogadores_selecionados[ordem[i]].length; j++) {
							jogadores.push(lista_de_jogadores_selecionados[ordem[i]][j]);
						}
					}
					var cookie_obj = {
						jogadores: jogadores,
						estrategia: estrategia_selecionada
					};
					Cookies.set('selecao_usuario', JSON.stringify(cookie_obj), { expires: 1 });

					var desempenho_panel = jQuery(".guias__container .desempenho_box .panel");
					desempenho_panel.addClass('open');
					desempenho_panel.slideDown(300,"swing", null);
					jQuery(".guias__container .desempenho_box .accordion").toggleClass("active");


					var suaselecao_panel = jQuery(".container_sua_selecao .panel");
					suaselecao_panel.addClass('open');
					suaselecao_panel.slideDown(300,"swing", null);
					jQuery(".container_sua_selecao .accordion").toggleClass("active");
				}
				refresh_area_sua_selecao();
				refresh_grafico();
			}
		}
		holder.find(".simulador-campo-select").scrollTop(checkpoint_scroll_accordeon_select);
	});
}
function startSearchbox_select_do_accordeon(posicao, holder){
	var searchBox = holder.find(".simulador-campo-search input");
	searchBox.val('');
	var search = function(e){
		jQuery(e.target).val((jQuery(e.target).val()).replace(/[^\w\s]/gi, '').replace("  ", " ").toLowerCase());
		var value = jQuery(e.target).val().replace(/[^\w\s]/gi, '').toLowerCase();
		value = value.replace("  ", " ");
		if(!value){
			addEmpresas_select_do_campo(posicao, _DATA[posicao]);
			return;
		}
		var filtered_DATA = [];
		for (var i = 0; i < _DATA[posicao].length; i++) {
			if(_DATA[posicao][i].nome.replace(/[^\w\s]/gi, '').toLowerCase().includes(value.toLowerCase())
			|| _DATA[posicao][i].ticker.replace(/[^\w\s]/gi, '').toLowerCase().includes(value.toLowerCase())){
				filtered_DATA.push({
					id: _DATA[posicao][i].id,
					nome: _DATA[posicao][i].nome,
					ticker: _DATA[posicao][i].ticker,
				});
			}
		}

		if(filtered_DATA.length > 0){
			addEmpresas_select_do_accordeon(posicao, filtered_DATA.sort((a, b) => a.nome.localeCompare(b.nome)), true, holder);
		}else{
			holder.find(".simulador-campo-result").remove();
			var separator = jQuery("<div class='simulador-campo-result separator'>Resultado não encontrado</div>");
			holder.append(separator);
		}
	};
	searchBox.on("input", search);

}

function addErrorTextTo_select_do_accordeon(appendTo, text){
	clearAllErrorTextOn_select_do_accordeon();
	jQuery(appendTo).append(jQuery("<p class='select-alert'>" + text + "</p>"));
	errorsList_accordeon.push(appendTo);
}
function clearAllErrorTextOn_select_do_accordeon(){
	if(errorsList_accordeon && errorsList_accordeon.length && errorsList_accordeon.length > 0){
		for (var i = 0; i < errorsList_accordeon.length; i++) {
			jQuery(errorsList_accordeon[i].find(".select-alert")[0]).remove();
		}
	}
	errorsList_accordeon = [];
}


function isEmpresaSelected(ticker_to_check){
	var ordem = ["ataque", "meio", "defesa"];
	for (var i = 0; i < ordem.length; i++) {
		for (var j = 0; j < lista_de_jogadores_selecionados[ordem[i]].length; j++) {
			if(lista_de_jogadores_selecionados[ordem[i]][j] == ticker_to_check) return true;
		}
	}
	return false;
}
function construtor_itemEmpresa(id,ticker,nome, isSelected){
	return jQuery("<div class='simulador-campo-result' api_id=" + id + " my_ticker=" + ticker + ">"
				+   "<p>"
				+     "<span class='empresa'>" + nome + " - </span>"
				+     "<span class='ticker-result'>" + ticker + "</span>"
				+   "</p>"
				+   "<span class='select-button" + (isSelected ? " selected" : "") + "'></span>"
				+ "</div>")
}



function animateTransition_tutorial(selector1, selector2, callback=null){
	jQuery(selector1).slideUp(150, ()=>{
		jQuery(selector2).slideDown(150, callback);
	});
}

function start_tutorial(){
	jQuery(".tutorial_block").css('display','block');
	jQuery(".fase_1").slideDown(300);
	jQuery("html, body").css("overflow", "hidden");
	jQuery(".fase_1 .tutorial_close," +
		   ".fase_2 .tutorial_close," +
		   ".fase_3 .tutorial_close," +
		   ".fase_4 .tutorial_close," +
		   ".fase_5 .tutorial_close," +
		   ".fase_6 .tutorial_close," +
		   ".close_geral_tutorial" 
	).click(()=>{
		jQuery(".tutorial_block").css('display', 'none');
		jQuery("html, body").css("overflow", "auto");
		jQuery(".fase_1").css({display: "none"});
		jQuery(".fase_2").css({display: "none"});
		jQuery(".fase_3").css({display: "none"});
		jQuery(".fase_4").css({display: "none"});
		jQuery(".fase_5").css({display: "none"});
		jQuery(".fase_6").css({display: "none"});
    	Cookies.set('tutorial_seen', new Date().toDateString(), { expires: 7 });
	});

	jQuery(".fase_1 .tutorial_next").click(()=>{
		animateTransition_tutorial(".fase_1", ".fase_2");
	});
	jQuery(".fase_2 .tutorial_next").click(()=>{
		animateTransition_tutorial(".fase_2", ".fase_3");
	});
	jQuery(".fase_3 .tutorial_next").click(()=>{
		animateTransition_tutorial(".fase_3", ".fase_4");
	});
	jQuery(".fase_4 .tutorial_next").click(()=>{
		animateTransition_tutorial(".fase_4", ".fase_5");
	});
	jQuery(".fase_5 .tutorial_next").click(()=>{
		animateTransition_tutorial(".fase_5", ".fase_6");
	});
}

function checkIfMobile(){
	if(jQuery(window).width() > 810) return false;
	return true;
}
function copyArray(arrayToCopy){
	var newArray = [];
	for (var i = 0; i < arrayToCopy.length; i++) {
		newArray.push(arrayToCopy[i]);
	}
	return newArray;
}

//Ler da api (ainda nao esta pronto)
function readfrom_API_INS(callback){
	callback();
}

function retorna_area_faltando(){
	var ordem = ["ataque", "meio", "defesa"];
	for (var i = 0; i < ordem.length; i++) {
		if(lista_de_jogadores_selecionados[ordem[i]].length < limites_por_estrategia[estrategia_selecionada][ordem[i]]){
			return ordem[i];
		}
	}
	return "";
}


//Funcoes relativas ao share (compartilhamento)
function add_click_to_share(){
	var ordem = ["ataque", "meio", "defesa"];
	var _urlBase = "https://investnews.com.br/";
	var _uri = "simulador-carteira-de-acoes/";
	var _text = "Confira o simulador de Carteiras Investnews";
	var dateJs = new Date();
	var _date = dateJs.getDate() + '-' + dateJs.getMonth() + '-' + dateJs.getFullYear() + '_' + dateJs.getHours() + ':' + dateJs.getMinutes(); //'d-m-Y_H:i'
	var _urlComplete = '';

	var _onClick = (e, callback)=>{
		_urlComplete = _urlBase + _uri;
		if(lista_de_jogadores_selecionados.count >= 10){
			var empresas = '';
			for (var i = 0; i < ordem.length; i++) {
				for (var j = 0; j < lista_de_jogadores_selecionados[ordem[i]].length; j++) {
					empresas += lista_de_jogadores_selecionados[ordem[i]][j] + ',';
				}
			}
			empresas = empresas.slice(0,empresas.length-2);
			_urlComplete += '?jogadores=' + empresas + '%26estrategia=' + estrategia_selecionada;
			callback();
		}else{
			var use_this_color = (estrategia_selecionada == 'ataque' ? cores[0] 
							   : (estrategia_selecionada == 'meio' ? cores[1] 
							   : cores[2]));

			jQuery(".feedback_share_selecionar_todos .ticker_feedback").html((retorna_area_faltando()).toUpperCase());
			jQuery(".feedback_share_selecionar_todos .ticker_feedback").css("border-color", use_this_color);
			jQuery(".feedback_share_selecionar_todos .ticker_feedback").css("color", use_this_color);
			jQuery(".fase_1").css({display: "none"});
			jQuery(".tutorial_block").css('display','block');
			jQuery(".feedback_share_selecionar_todos").slideDown(300);
			jQuery("html, body").css("overflow", "hidden");

			jQuery(".feedback_share_selecionar_todos .tutorial_close").click(()=>{
				jQuery(".tutorial_block").css('display', 'none');
				jQuery(".feedback_share_selecionar_todos").slideUp(150);
				jQuery("html, body").css("overflow", "auto");
			});
		}
	};
	jQuery(".mvp-post-soc-whats").parent().click((e)=>{
		_onClick(e, ()=>{
			window.open('https://wa.me/?text=' + _text + ' ' + _urlComplete
				+ '?utm_source=whatsapp');
			return false;
		});
	});
	jQuery(".mvp-post-soc-twit").parent().click((e)=>{
		_onClick(e, ()=>{
			window.open('http://twitter.com/share?text=' + _text + ' ' + _urlComplete
				+ '?utm_source=twitter' 
				, 'twitterShare', 'width=626,height=436');
			return false;
		});
	});

	jQuery(".mvp-post-soc-fb").parent().click((e)=>{
		_onClick(e, ()=>{
			window.open('http://www.facebook.com/sharer.php?u=' + _urlComplete + '%26t=' + _text 
				+ '%26utm_source=facebook' 
				, 'facebookShare', 'width=626,height=436');
			return false;
		});
	});

	jQuery(".mvp-post-soc-linked").parent().click((e)=>{
		_onClick(e, ()=>{
			window.open('http://www.linkedin.com/shareArticle?mini=true&url=' + _urlComplete + '&title=' + _text 
				+ '&utm_source=linkedin' 
				, 'linkedinShare', 'width=626,height=436');
			return false;
		});
	});
	jQuery(".mvp-post-soc-telegram").parent().click((e)=>{
		_onClick(e, ()=>{
			window.open('https://t.me/share/url?url=' + _urlComplete 
				+ '%26utm_source=telegram' 
				, 'telegramShare', 'width=626,height=436');
			return false;
		});
	});
	jQuery(".mvp-post-soc-flipboard").parent().click((e)=>{
		_onClick(e, ()=>{
			window.open('https://share.flipboard.com/bookmarklet/popout?ext=sharethis&title=' + _text + '&url=' + _urlComplete 
				+ '%26utm_source=flipboard' 
				, 'flipboardShare', 'width=626,height=436');
			return false;
		});
	});
}


function find_data_by_ticker(ticker){
	var ordem = ["ataque", "meio", "defesa"];
	for (var j = 0; j < ordem.length; j++) {
		for (var k = 0; k < _DATA[ordem[j]].length; k++) {
			if(_DATA[ordem[j]][k].ticker == ticker){
				return _DATA[ordem[j]][k];
			}
		}
	}
	return null;
}

//Funcao que cuida de atualizar as infos do accordion de "Sua Selecao"
function refresh_area_sua_selecao(){
	jQuery(".selecao_list .selecao_item").remove();
	jQuery(".selecao_list .selecao_warn").remove();
	jQuery(".selecao_list .selecao_separator").remove();

	var attached_to;
	var posicao_attached;
	var select_area_holder = jQuery(".selecao_list .simulador-campo-select-holder");	
	if(select_area_holder){
		attached_to = select_area_holder.attr("_attached");
		posicao_attached = select_area_holder.attr("_posicao");
	}

	jQuery(".selecao_disclaimer").show();
	var ordem = ["ataque", "meio", "defesa"];
	var have_attached = false;

	for (var j = 0; j < ordem.length; j++) {
		var separator_text = ordem[j].charAt(0).toUpperCase() + ordem[j].slice(1);
		var list_separator = jQuery('<div class="selecao_separator" style="color:'+cores[j]+';border-color:'+cores[j]+'">'+separator_text+'</div>');
		jQuery(".selecao_list").append(list_separator);
		
		if(lista_de_jogadores_selecionados[ordem[j]].length > 0){
			for (var k = 0; k < lista_de_jogadores_selecionados[ordem[j]].length; k++) {
				var data = find_data_by_ticker(lista_de_jogadores_selecionados[ordem[j]][k]);
				if(data){
					var list_item = jQuery(
						'<div class="selecao_item">'
					  		+ '<div class="selecao_ticker">'
					  			+ '<p style="color:'+cores[j]+'">' + data.ticker + ' <span class="selecao_name">- ' + data.nome + '</span></p>'
					  		+ '</div>'
					  		+ '<div class="selecao_value">'
					  			+ '<p class="' + (data.desempenho >= 0 ? "green" : "red") + '">' + (data.desempenho >= 0 ? "+" : "")+ data.desempenho + '%</p>'
					  		+ '</div>'
					  		+ '<div class="selecao_cta">'
					  			+ '<p><a href="https://investnews.com.br/cotacao/acao/?ticker=' + data.ticker + '" aria-label="Entrar" target="_blank">Cotação diária</a></p>'
					  		+ '</div>'
					  		+ '<div class="select_inside" onclick="show_select_do_accordeon(event)" _posicao="' + ordem[j] + '" _ticker="' + data.ticker + '">'
					  			+ '<i class="fa fa-refresh" aria-hidden="true"></i> <p> Substituir ativo</p>'
					  		+ '</div>'
					  	+ '</div>'
					);
					jQuery(".selecao_list").append(list_item);
					if(attached_to && data.ticker == attached_to){
						jQuery(".selecao_list").append(select_area_holder);
						have_attached = true;
					}
				}
			}
		}else{
			jQuery(".selecao_list").append('<div class="selecao_warn">Para visualisar essa informação, escolha quais empresas farão parte da sua seleção.</div>');
			jQuery(".selecao_disclaimer").hide();
		}
	}
	if(select_area_holder && !have_attached){
		jQuery(".selecao_list .selecao_separator").each((i, e)=>{
			if(jQuery(e).html().toLowerCase() === posicao_attached){
				jQuery(e).after(select_area_holder);
			}
		});
	}
}

function clearAllTickersSelected(){
	lista_de_jogadores_selecionados = {
		ataque: [],
		meio: [],
		defesa: [],
		count: 0
	};
}



//FUNCOES PARA CONTROLAR O INICIO DO FLUXO
function checkStart(){
	//Pega parametros URL
	if(location.search != "" && location.search != null && location.search != undefined){
		var search = location.search.substring(1);
		if(search){
			var search_obj = JSON.parse('{"' + decodeURI(search).replace(/"/g, '\\"').replace(/&/g, '","').replace(/=/g,'":"') + '"}');
			if(search_obj.jogadores && search_obj.jogadores != "" && search_obj.estrategia && search_obj.estrategia != ""){
				var array_jogadores = search_obj.jogadores.split(",");
				array_jogadores.forEach((e,i)=>{
					array_jogadores[i] = e.slice(0,7);
				})
				if(array_jogadores && array_jogadores.length > 0){
					if(estrategia_por_optionNumber.includes(search_obj.estrategia) && array_jogadores.length == 10){
						preLoaded_initiate(array_jogadores, search_obj.estrategia);
						return;
					}
				}
			}
		}
	}else if(Cookies.get('selecao_usuario')){
		var selecao = Cookies.get('selecao_usuario');
		var selecao_obj = JSON.parse(selecao);
		if(selecao_obj 
			&& selecao_obj.jogadores && selecao_obj.jogadores.length && selecao_obj.jogadores.length == 10 
			&& selecao_obj.estrategia && selecao_obj.estrategia != "" && estrategia_por_optionNumber.includes(selecao_obj.estrategia.toLowerCase())
		){
			preLoaded_initiate(selecao_obj.jogadores, selecao_obj.estrategia);
			return;
		}
	}
	default_initiate();

	//do a laast thing
}
//Inicio padrao com tutorial (Jogadores e estrategias indefinidos)
function default_initiate(){
	criaTickers_campo();
	if(!Cookies.get('tutorial_seen')){
		start_tutorial();
	}


	var desempenho_panel = jQuery(".guias__container .desempenho_box .panel");
	desempenho_panel.addClass('open');
	desempenho_panel.slideDown(300,"swing", null);
	jQuery(".guias__container .desempenho_box .accordion").toggleClass("active");


	var suaselecao_panel = jQuery(".container_sua_selecao .panel");
	suaselecao_panel.addClass('open');
	suaselecao_panel.slideDown(300,"swing", null);
	jQuery(".container_sua_selecao .accordion").toggleClass("active");

	refresh_area_sua_selecao();
	refresh_grafico();

}
//Inicio com carregamento previo (Jogadores e estrategias predefinidos)
function preLoaded_initiate(jogadores, estrategia){
	estrategia_selecionada = estrategia;
	criaTickers_campo(estrategia);
	jQuery(".mvp-main-box .select-estrategia-holder select option").each((i,e)=> {
		if(jQuery(e).html().toLowerCase() == estrategia){
			jQuery(e).attr("selected", "true");
		}
	})
	modificaTodosTickers_campo(jogadores);

	var desempenho_panel = jQuery(".guias__container .desempenho_box .panel");
	desempenho_panel.addClass('open');
	desempenho_panel.slideDown(300,"swing", null);
	jQuery(".guias__container .desempenho_box .accordion").toggleClass("active");

	var suaselecao_panel = jQuery(".container_sua_selecao .panel");
	suaselecao_panel.addClass('open');
	suaselecao_panel.slideDown(300,"swing", null);
	jQuery(".container_sua_selecao .accordion").toggleClass("active");

	refresh_area_sua_selecao();
	refresh_grafico();
}

/* //////////////////////
		DO STUFF 
////////////////////// 
*/

//check the size of the screen
var width_to_change_behaviour_ShowHorizontal = 1199;
function checkif_size_above_threshold_ShowHorizontal(){
	return document.documentElement.clientWidth > width_to_change_behaviour_ShowHorizontal;
}
var width_to_change_behaviour_mobile = 792;
function checkif_size_above_threshold_mobile(){
	return document.documentElement.clientWidth > width_to_change_behaviour_mobile;
}


readfrom_API_INS(() => {
	checkStart();
	addClickToTickers_campo();

	//Adiciona evento ao select de estrategias
	jQuery(".mvp-main-box .select-estrategia-holder select").change((e)=>{
		var optionNumber = jQuery(".select-estrategia-holder select option:selected").attr("value");
		estrategia_selecionada = estrategia_por_optionNumber[optionNumber];
		clearAllTickersSelected();
		removeTodosTickers_campo();
		criaTickers_campo();
		addClickToTickers_campo();
	});

	add_click_to_share();
});


//Funcionamento do Accordion
var acc = document.getElementsByClassName("accordion");
var i;

for (i = 0; i < acc.length; i++) {
    acc[i].addEventListener("click", function () {
        // Evita comportamento incorreto ao clicar em "accordeon_desempenho" com a condição
        if (jQuery(this).hasClass('accordeon_desempenho') && checkif_size_above_threshold_ShowHorizontal()) {
            return;
        }

        var panel = jQuery(this.nextElementSibling);

        // Verifica se está em transição e previne novos cliques
        if (panel.is(":animated")) {
            return;
        }

        // Alterna a classe "active" no botão atual
        this.classList.toggle("active");

        if (panel.hasClass('open')) {
            panel.removeClass('open').slideUp(300, "swing");
        } else {
            // Fecha outros painéis antes de abrir o atual
            jQuery('.accordion').not(this).each(function () {
                var otherPanel = jQuery(this.nextElementSibling);
                otherPanel.removeClass('open').slideUp(300, "swing");
                jQuery(this).removeClass("active");
            });

            // Abre o painel atual
            if (jQuery(this).hasClass('accordion_sua_selecao')) {
                refresh_area_sua_selecao();
            }
            if (jQuery(this).hasClass('accordeon_desempenho')) {
                refresh_grafico();
            }

            panel.addClass('open').slideDown(300, "swing");
        }
    });
}


function refresh_grafico() {
	var truncate = function (val) {
		val = val * 100;
		val = parseInt(val) / 100;
		return val;
	};
	var jogadores = [];
	var ordem = ["ataque", "meio", "defesa"];
	for (var i = 0; i < ordem.length; i++) {
		for (var j = 0; j < lista_de_jogadores_selecionados[ordem[i]].length; j++) {
			jogadores.push(_DATA[ordem[i]].filter(e=>e.ticker == lista_de_jogadores_selecionados[ordem[i]][j])[0])
		}
	}

	var soma_grafico = [];
	var soma_media = 0;
	for (var i = 0; i < jogadores.length; i++) {
		if(jogadores[i] && jogadores[i].grafico && jogadores[i].grafico.length > 0){
			for (var j = 0; j < jogadores[i].grafico.length; j++) {
				if(!soma_grafico[j]) {
					soma_grafico[j] = 0;
				}
				soma_grafico[j] += parseFloat(jogadores[i].grafico[j]);
			}
			soma_media += parseFloat(jogadores[i].desempenho);
		}
	}

	for (var i = 0; i < soma_grafico.length; i++) {
		soma_grafico[i] = truncate(soma_grafico[i] / jogadores.length);
	}
	if(soma_grafico.length > label.length){
		soma_grafico = soma_grafico.slice(soma_grafico.length - label.length);
	}

	soma_media = soma_media / jogadores.length;

	if(!soma_media) {
		soma_media = 0;
	}

	jQuery('.desempenho_box .desempenho_item .variacao_suaselecao')
		.removeClass('ativos__variacao--positivo')
		.removeClass('ativos__variacao--negativo');

	jQuery('.desempenho_box .desempenho_item .variacao_suaselecao').html( (soma_media > 0 ? "+"  : (soma_media < 0 ? "-" : "")) + truncate(soma_media) + "%");

	if(soma_media > 0) {
		jQuery('.desempenho_box .desempenho_item .variacao_suaselecao').removeClass('ativos__variacao--negativo');
		jQuery('.desempenho_box .desempenho_item .variacao_suaselecao').addClass('ativos__variacao--positivo');
	} else if(soma_media < 0){
		jQuery('.desempenho_box .desempenho_item .variacao_suaselecao').removeClass('ativos__variacao--positivo');
		jQuery('.desempenho_box .desempenho_item .variacao_suaselecao').addClass('ativos__variacao--negativo');
	}else{
		jQuery('.desempenho_box .desempenho_item .variacao_suaselecao').removeClass('ativos__variacao--positivo');
		jQuery('.desempenho_box .desempenho_item .variacao_suaselecao').removeClass('ativos__variacao--negativo');
	}

	config.data.datasets[0].data = soma_grafico;
	config2.data.datasets[0].data = soma_grafico.filter((e,i)=>{return (i%2 == 0);});

	chartDesk.update();
	chartMobile.update();
}