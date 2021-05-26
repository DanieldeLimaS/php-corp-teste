function abreAba(evt, aba) {
  let i, conteudo, abas

  conteudo = document.getElementsByClassName("conteudo")

  for(i=0; i < conteudo.length; i++){
    conteudo[i].style.display = "none"
  }

  abas = document.getElementsByClassName("aba")

  for(i=0; i < abas.length; i++) {
    abas[i].classList.remove("aberta")
  }

  document.getElementById(aba).style.display = "block"
  evt.currentTarget.classList.add("aberta")
}