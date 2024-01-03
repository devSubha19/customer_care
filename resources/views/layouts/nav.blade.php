<style>
.navba {
    background-color:rgb(118 36 197);
    height: 9rem;
    border-bottom: 1px solid transparent;  
    transition: border-bottom 0.3s ease;  
    display: flex;
    justify-content: space-between;
    align-items: center;
    font-size: 1.7rem;
    background-color: rgb(131 72 199);
    border-bottom: 2px solid black;
 
  }

  .logo-div{
        height: 10rem;
        widows: 10rem;
         
  }
 

  .navba a {
    text-decoration: none;
    color: white;
  }

  .navba ul {
    display: flex;
    list-style-type: none;
    gap: 30px;
    padding-right: 60px;
    color: white;
  }

  .navba li {
    display: flex;
    gap: 5px;
    cursor: pointer;
  }
  .com{
    margin: 0 2rem 0 10rem;
  }
  .imglogo{
    width: 100%;
    height: 100%;
  }
</style>

<div class="navba">
    <div class="logo-div com">
            <img src="{{asset('images/app_icon.png')}}" alt="" class="imglogo">
    </div>
    <div class="action-div com">
    <ul>
        <li id="menu-btn"><i class="fa-solid fa-bars"></i>Menu</li>
        <a href="logout">
            <li><i class="fa-solid fa-arrow-right-from-bracket"></i>Logout</li>
        </a>
    </ul>
</div>
</div>
