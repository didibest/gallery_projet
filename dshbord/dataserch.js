
const categories = [...new Set (data.map((item)=> {return item}))]
document.getElementById('searchInput').addEventListener('keyup', (e)=>{

    const searchData = e.target.value.toLowerCase();
    
    const filterData = categories.filter((item)=> {
    
    return(
    
    item.full_name.toLocaleLowerCase().includes (searchData)
    
    )
    
    }) 
    
    displayItem(filterData)
    
    });
   
    const displayItem = (items)=> {
        document.getElementById('root').innerHTML=items.map((item)=>{

            var {full_name, email, message} = item;
            
            return(
            
                ` <tr>
                  <td><a class="btn-td">Reply</a></td>
                 <td><p>${message}</p></td>
                  <td><span>${full_name}</span></td>
                  <td><span class="">  ${email} </span></td>
                  </tr>`
            
            )
            
            }).join('')
            
 };
            
            displayItem(categories);
    