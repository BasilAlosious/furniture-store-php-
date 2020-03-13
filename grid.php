#content{
    display: grid;
    min-width: 100vw;
    max-width: 100vw;
    margin: 0 auto;
    /*grid-template-columns: 30% 20% 50%; */ 
    /*grid-template-columns: 1fr 2fr 1fr;*/
    grid-template-columns: repeat(3, 1fr);
    /*grid-auto-rows: 200px;*/
    
    grid-gap: 1em;
    
}


#content div{
    background: ;
    padding: 30px;
    font-family: "avenir";
    font-size: 12px;
    align-items: center;
}


#content div:nth-child(even){
    background:  ;
}
           

img {
    width: 100%;
    height: auto;
}
            
     
    
@media(max-width: 500px) {
    #navigation {
        width: auto;
        height: auto;
    }
    
    img {
        width: 150%;
        height: auto;
    }
    #content{
         grid-template-columns: repeat(1, 1fr);
        font-size: 8px;
        position: absolute;
        margin-top: 50vh;
    }
    
}
            
#form {
    position: absolute;
    margin-left: 80vw;
    margin-top: 35px;
    font-size: 30px;
}

#wel{
     position: absolute;
    margin-left: 40vw;
    margin-top: 5px;
    font-size: 60px;
    color: #A9A9A9 ;   
  }

  #sc{
     position: absolute;
    margin-left: 35vw;
    margin-top: 50px;
    font-size: 30px;
    color: #A9A9A9 ;   
  }

  #products_box {
width:780px; 
text-align:center;
margin-left:30px;
margin-bottom:10px; 
}

  #single_product {float:left; margin-left:30px; padding:10px;}
  
  #single_product img {border:2px solid white;}

        </style>
