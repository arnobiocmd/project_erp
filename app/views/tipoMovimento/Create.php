<div class="p-2 bg-title text-light text-uppercase h5 mb-0 text-branco d-flex justify-content-space-between">
			<span><i class="fas fa-plus-circle"></i> Cadastrar Tipo Movimento</span>
			<a href="<?php echo URL_BASE."tipomovimento"?>" class="btn btn-verde btn-pequeno"><i class="fas fa-arrow-left"></i>  Voltar</a>
		</div>  
		
	<div class="p-1">
			<?php 
                $this->verMsg();
                $this->verErro();
            ?>
	</div>
		<form action="<?php echo URL_BASE."tipomovimento/salvar"?>" method="Post">
            <div class="col-6 d-block m-auto rows px-5 py-">
				<div class="border radius-4 mt-5 px-4">
					<div class="col-12 mb-3 mt-5">
						<label class="text-label">Descrição</label>	
						<input type="text" name="tipo_movimento" value="<?php echo ($tipomovimento->tipo_movimento) ? $tipomovimento->tipo_movimento : null?>" class="form-campo" placeholder="Digite o tipo de movimento">
					</div>    
					<div class="col-12 mb-3">
						<label class="text-label">Tipo</label>	
						<select  class="form-campo" name="ent_sai">
                            <option value="E" <?php echo ($tipomovimento->ent_sai == "E") ? "selected": null?>>Entrada</option>
                            <option value="S" <?php echo ($tipomovimento->ent_sai == "S") ? "selected" : null?>>Saída</option>
                            
						</select>
					</div>
					<div class="col-12 mb-3">
						<label class="text-label">Movimenta Estoque</label>	
						<select  class="form-campo" name="movimenta_estoque">
                            <option value="S" <?php echo ($tipomovimento->movimenta_estoque == "S") ? "selected" : null?>>Sim</option>
                            <option value="N" <?php echo ($tipomovimento->movimenta_estoque == "N") ? "selected" : null?>>Não</option>
						
						</select>
					</div>
					<div class="col-12 mt-3 mb-5">
						<input type="hidden" name="id_tipo_movimento" value="<?php echo ($tipomovimento->id_tipo_movimento) ? $tipomovimento->id_tipo_movimento : null?>">
						<input type="submit"  value="Salvar tipo movimento" class="btn btn-laranja d-block m-auto">
					</div>
					 
				</div>
        </form>