

<div class="row">
      <div class="col-12 col-md-8 col-lg-6"> 
          <h3>Edit profile</h3>
          <form method="POST" action="" enctype="multipart/form-data">
              <div class="row">
                  <div class="col">
                      <div class="form-group">
                          <label for="firstname">First name</label>
                          <div>
                              <input type="text" class="form-control" id="firstname" placeholder="First name" name="firstname" value="" >
                          </div>
                      </div>
                  </div> 
                  <div class="col">
                      <div class="form-group">
                          <label for="lastname">Last name</label>
                          <div>
                              <input type="text" class="form-control" id="lastname" placeholder="Last name" name="lastname" value="" >
                          </div>
                      </div>
                  </div> 
              </div>
              
              <div class="form-check form-check-inline">
                  <input class="form-check-input" type="radio" name="Gender" id="female" value="Female" checked >
                  <label class="form-check-label" for="female">Female</label>
              </div>
              <div class="form-check form-check-inline">
                  <input class="form-check-input" type="radio" name="Gender" id="male" value="Male"  >
                  <label class="form-check-label" for="male">Male</label>
              </div>

              <div class="row">
                  <div class="form-group col-4">
                      <select class="form-control" id="birthdayDay" name="day"  >
                          <option value="" selected hidden>Day</option>
                          <option value="1">1</option>
                          <option value="2">2</option>
                          <option value="3">3</option>
                          <option value="4">4</option>
                          <option value="5">5</option>
                          <option value="6">6</option>
                          <option value="7">7</option>
                          <option value="8">8</option>
                          <option value="9">9</option>
                          <option value="10">10</option>
                          <option value="11">11</option>
                          <option value="12">12</option>
                          <option value="13">13</option>
                          <option value="14">14</option>
                          <option value="15">15</option>
                          <option value="16">16</option>
                          <option value="17">17</option>
                          <option value="18">18</option>
                          <option value="19">19</option>
                          <option value="20">20</option>
                          <option value="21">21</option>
                          <option value="22">22</option>
                          <option value="23">23</option>
                          <option value="24">24</option>
                          <option value="25">25</option>
                          <option value="26">26</option>
                          <option value="27">27</option>
                          <option value="28">28</option>
                          <option value="29">29</option>
                          <option value="30">30</option>
                          <option value="31">31</option>
                        </select>
                  </div>
                  <div class="form-group col-4">
                      <label for="birthdayMonth" class="sr-only">Birthday month</label>
                      <select class="form-control" id="birthdayMonth" name="month" >
                        <option value="" selected hidden>Month</option>
                        <option value="01">January</option>
                        <option value="02">February</option>
                        <option value="03">March</option>
                        <option value="04">April</option>
                        <option value="05">May</option>
                        <option value="06">June</option>
                        <option value="07">July</option>
                        <option value="08">August</option>
                        <option value="09">September</option>
                        <option value="10">October</option>
                        <option value="11">November</option>
                        <option value="12">December</option>
                      </select>
                    </div>
                    <div class="form-group col-4">
                      <label for="birthdayYear" class="sr-only">Birthday year</label>
                      <select class="form-control" id="birthdayYear" name="year" >
                        <option value=">" selected hidden>Year</option>
                        <option value="1980">1980</option>
                        <option value="1981">1981</option>
                        <option value="1982">1982</option>
                        <option value="1983">1983</option>
                        <option value="1984">1984</option>
                        <option value="1985">1985</option>
                        <option value="1986">1986</option>
                        <option value="1987">1987</option>
                        <option value="1988">1988</option>
                        <option value="1989">1989</option>
                        <option value="1990">1990</option>
                        <option value="1991">1991</option>
                        <option value="1992">1992</option>
                        <option value="1993">1993</option>
                        <option value="1994">1994</option>
                        <option value="1995">1995</option>
                        <option value="1996">1996</option>
                        <option value="1997">1997</option>
                        <option value="1998">1998</option>
                        <option value="1999">1999</option>
                        <option value="2000">2000</option>
                      </select>
                    </div>
                  
              </div>

              <div class="row">
                  <div class="col">
                        <div class="form-group">
                            <label for="city">City</label>
                            <div>
                                <input type="text" class="form-control" id="city" placeholder="City" name="city" value="" >
                            </div>
                        </div>
                  </div> 
                  <div class="col">
                        <div class="form-group">
                            <label for="state">State</label>
                            <div>
                                <input type="text" class="form-control" id="state" placeholder="State" name="state" value="" > 
                            </div>
                        </div>
                  </div> 
                </div>
                <div class="form-group">
                  <div class="custom-file">
                    <input type="file" id="example-file-custom-button" class="custom-file-input" name="file" value="" >
                    <input type="hidden"  name="old_image" value="" >
                    <label class="custom-file-label" for="example-file-custom-button" data-browse="Select file" >Custom file browser</label>
                  </div>
                </div>


              <div class="form-group">
                  <div>
                      <button type="submit" class="btn btn-primary" name="submit">Save Profile</button>
                  </div>
              </div>
          </form>
      </div>
  </div>