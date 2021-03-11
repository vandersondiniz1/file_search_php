<?php
# ---------------------------------------------------------------- #
# Script:        funcoes.php
# Description:   FUNCOES DO SISTEMA 
# Written by	 vanderson.lima
# Date:			 10.03.2021
#            	 Grupo Vicoa Brasil
# ---------------------------------------------------------------- #

# PROCURA AUDIOS POR TRECHOS INFORMADOS. EM UM ARQUIVO COM ROTULO: 3071_09823384812_08933421292_982377_308190.wav,
# SE NAO ENCONTRAR O CPF, PROCURA PELO TELEFONE, SE NAO, POR OUTRO DADO, ETC.
function verificaPeriodo($dia, $mes, $ano){
	
	if ($ano >= 2016 && $ano < 2018){
		$dir = "/media/suporte/GRAVACOES/GRAVACOES_ISSABEL/" . $ano . "/" . $mes . "/" . $dia . "/";
	}
	else
		if ($ano == 2018 && $mes <= '09')
		{
			$dir = "/media/suporte/GRAVACOES/GRAVACOES_ISSABEL/" . $ano . "/" . $mes . "/" . $dia . "/";
		}
		else
			if ($ano >= 2018 && $mes >= 11)
			{
				$dir = "/media/suporte/GRAVACOES/GRAVACOES_FAST/". $ano . "/" . $mes . "/" . $dia . "/";
			}
			else
				if ($ano >= 2019 && $ano <= 2020)
				{
					$dir = "/media/suporte/GRAVACOES/GRAVACOES_FAST/". $ano . "/" . $mes . "/" . $dia . "/";
				}
				else
					if ($ano == 2018 && $mes == 10)
					{
						echo "<script>window.alert('Conflito de Diretórios. Este Áudio Deve ser Procurado pela Equipe de TI');</script>";
						$dir = "/var/null";
						header("Refresh:1;url=index.html");		
					}
					else
					{
						echo "<script>window.alert('Verifique os Dados Informados e Tente Novamente');</script>";
						$dir = "/var/null";
						header("Refresh:1;url=index.html");	
					}
	return $dir;
}
?>