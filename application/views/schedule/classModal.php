
					        
								<div class="row">
									<div class="col-lg-12">
											<form role="form" action="<?php echo site_url("/schedule/add"); ?>" method="post">
												<fieldset>
					                                <div class="form-group">
					                                    <label for="name">Dersin adı:</label>
					                                    <input class="form-control" placeholder="Dersin adını yazın..." name="class" type="text" autofocus required>
					                                </div>
					                                <div class="form-group">
					                                    <label for="surname">Dersin sınıfı:</label>
					                                    <input class="form-control" placeholder="Bu alan zorunlu değil!" name="classroom" type="text">
					                                </div>
					                                <div class="form-group">
			                                            <label>Dersin günü:</label>
			                                            <select name="day" class="form-control">
			                                                <option value="1">Pazartesi</option>
			                                                <option value="2">Salı</option>
			                                                <option value="3">Çarşamba</option>
			                                                <option value="4">Perşembe</option>
			                                                <option value="5">Cuma</option>
			                                            </select>
			                                        </div>
					                                <div class="form-group">
					                                    <div class="row">
					                                    	<div class="col-lg-6">
					                                    		<label>Başladığı saat:</label>
					                                            <select name="start" class="form-control">
					                                                <option value="1">8.30</option>
					                                                <option value="2">9.30</option>
					                                                <option value="3">10.30</option>
					                                                <option value="4">11.30</option>
					                                                <option value="5">12.30</option>
					                                                <option value="6">13.30</option>
					                                                <option value="7">14.30</option>
					                                                <option value="8">15.30</option>
					                                                <option value="9">16.30</option>
					                                            </select>
					                                    	</div>
					                                    	<div class="col-lg-6">
					                                    		<label> Bittiği saat:</label>
					                                            <select name="finish" class="form-control">
					                                                <option value="2">9.30</option>
					                                                <option value="3">10.30</option>
					                                                <option value="4">11.30</option>
					                                                <option value="5">12.30</option>
					                                                <option value="6">13.30</option>
					                                                <option value="7">14.30</option>
					                                                <option value="8">15.30</option>
					                                                <option value="9">16.30</option>
					                                                <option value="10">17.30</option>
					                                            </select>
					                                    	</div>
					                                    </div>
					                                </div>
					                                <div class="form-group">
					                                    <div class="row">
					                                    	<div class="col-lg-6">
					                                    		<label>Ders yılı:</label>
					                                            <select name="year" class="form-control">
					                                                <option value="2018">2017-2018</option>
					                                                <option value="2019">2018-2019</option>
					                                                <option value="2020">2019-2020</option>
					                                                <option value="2021">2020-2021</option>
					                                            </select>
					                                    	</div>
					                                    	<div class="col-lg-6">
					                                    		<label>Dönem:</label>
					                                            <select name="term" class="form-control">
					                                                <option value="1">Bahar</option>
					                                                <option value="2">Güz</option>
					                                            </select>
					                                    	</div>
					                                    </div>
					                                </div>

					                                <button type="submit" name="submit" class="btn btn-lg btn-info btn-block"> Dersi Ekle </button>
					                            </fieldset>
											</form>
									</div>
								</div>
							