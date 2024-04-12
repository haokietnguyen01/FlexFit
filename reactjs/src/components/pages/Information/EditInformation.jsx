import { Link } from "react-router-dom"
import "./Edit_information.css"
export default function EditInformation(){
    return(
        <div id="edit_information">
        <div className="container">
          <div className="row">
            <div className="col-sm-3 edit_information_border mb-5">
              <div className="mb-5 edit_information_setting">
                <a href="#"><i className="fa-solid fa-chevron-left" /><span className="fs-20 font-weight">Settings</span></a>
              </div>
              <div className="edit_information_detail">
                <Link to="/user/edit_information" className="mb-5"><i className="fa-solid fa-pencil" /><span className="near_gray">Edit
                    profile</span></Link>
                <a href data-bs-toggle="collapse" className="mb-4 arrow-link" data-bs-target="#demo"><i className="fa-solid fa-shield" /><span className="near_gray">Security</span></a>
                <div id="demo" className="collapse padding-security">
                  <Link to="/user/changepassword"><i className="fa-solid fa-key" />Change the password</Link>
                  <Link className="mt-4" to="/user/disableaccount"><i className="fa-solid fa-ban" />Disable Account</Link>
                </div>
              </div>
            </div>
            <div className="col-sm-9">
              <div className="row">
                <div className="col-sm-4 edit_information_padding">
                  <p className="red font-weight fs-25 edit_information_title mb-5">Edit Profile</p>
                </div>
                <div className="col-sm-6 ta-end edit_information_image mb-4">
                  <img src="http://localhost/BE/public/images/Image13.png" alt={8888} />
                </div>
                <div className="col-sm-10 edit_information_padding">
                  <form className="mb-5">
                    <div className="mb-4">
                      <div className="row">
                        <div className="col-sm-6">
                          <p className="font-weight">First Name</p>
                          <input type="text" className="w-90" />
                        </div>
                        <div className="col-sm-6 ">
                          <p className="font-weight">Last Name</p>
                          <input type="text" className="w-100" />
                        </div>
                      </div>
                    </div>
                    <div>
                      <p className="font-weight">Day of birth</p>
                      <input type="text" className="w-100 mb-4" />
                    </div>
                    <div>
                      <p className="font-weight">Email</p>
                      <input type="text" className="w-100 mb-4" placeholder="ABC@gmail.com" />
                    </div>
                    <div>
                      <p className="font-weight">Address</p>
                      <input type="text" className="w-100 mb-4" placeholder="abc" />
                    </div>
                    <div>
                      <p className="font-weight">Contact number</p>
                      <input type="text" className="w-100 mb-4" placeholder={12345678} />
                    </div>
                    <div className="mb-4">
                      <div className="row">
                        <div className="col-sm-6">
                          <p className="font-weight">City</p>
                          <input type="text" className="w-90" />
                        </div>
                        <div className="col-sm-6 mr-55 ">
                          <p className="font-weight">State</p>
                          <input type="text" className="w-100" />
                        </div>
                      </div>
                    </div>
                    <div className="row mt-5">
                      <div className="col-sm-6 center">
                        <div className="btn-cancel">
                          <button className="btn">Cancel</button>
                        </div>
                      </div>
                      <div className="col-sm-6 center">
                        <div className="btn-save">
                          <button className="btn">Save</button>
                        </div>
                      </div>
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    )
}