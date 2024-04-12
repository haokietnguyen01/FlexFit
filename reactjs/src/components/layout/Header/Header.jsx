import "./Header.css"
import { Link, useNavigate } from "react-router-dom"

export default function Header() {
    const navigate = useNavigate();
    var admin = localStorage.getItem("authAdmin")
    var customer = localStorage.getItem("authcustomer")
    if (admin) {
        admin = JSON.parse(admin);
        console.log(admin)
    }
    if(customer){
        customer = JSON.parse(customer);
        console.log(customer)
    }

    function renderLogout() {
        if (admin) {
            return (
                <div className="col-sm-4 ta-end">
                    <button class="btn" onClick={Logout}><i class="fa-solid fa-right-from-bracket"></i></button>
                </div>
            )
        }else if(customer){
           return(
            <div className="dropdown">
            <a data-bs-toggle="dropdown">
              <i className="fa-solid fa-user"></i>
            </a>
            <ul className="dropdown-menu">
              <li><Link to="/user/edit_information" className="dropdown-item">Information</Link></li>
              <li><button className="dropdown-item" onClick={Logout}>Logout</button></li>
            </ul>
            
          </div>
           )
        }
        
        else {
            return (
                <div className="col-sm-4 center">
                    <Link to="/user/public/register"><button className="btn btn-sign-in">Sign in</button></Link>
                    <Link to="/user/public/login"><button className="btn btn-sign-up">Sign up</button></Link>
                </div>
            )
        }
    }
    function Logout(){
        if (admin) {
            navigate("/admin/private/login")
        }
        if(customer){
            navigate('/user/public/login')
        }
        localStorage.clear();
    }
    return (
        <div id="header">
            <div className="container">
                <div className="row">
                    <div className="col-sm-3">
                        <div className="header-logo">
                            <a href="home.html" className="header-logo-title"><img src="http://localhost/BE/public/images/Image8.jpg" alt="" /><span className="font-weight">FlexFit</span></a>
                        </div>
                    </div>
                    <div className="col-sm-5">
                        <div className="header-content">
                            <a href="#">About</a>
                            <Link to="/user/service/body">Service</Link>
                            <a href="#">Calculator % bodyfat</a>
                        </div>
                    </div>
                    {renderLogout()}
                </div>
            </div>
        </div>
    )
}