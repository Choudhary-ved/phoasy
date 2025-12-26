var redirUrl = "";
				var wpsafelink = "https://phoasy.com/?link=";
				var domain = [""];
				var exclude_domain = [""];
				var els = document.getElementsByTagName("a"); 
				for(var i = 0, l = els.length; i < l; i++) {	
					var el = els[i]; 
					var li = el.href;
					
					if( exclude_domain.length > 0 && exclude_domain[0] != "" ) {
						var exists = false;
						for(var d=0; d < exclude_domain.length; d++){
							if(li.includes(exclude_domain[d])){
								exists = true;
							}
						}
						if( !exists ) {
							el.target = "_blank";
							if( !wpsafelink.includes("?") ) {
								el.href = wpsafelink + btoa(el.href) + "?redir=" + btoa(redirUrl);
							} else {
								el.href = wpsafelink + btoa(el.href) + "&redir=" + btoa(redirUrl);
							}
						}
					} else if(domain.length > 0 && domain[0] != "") {
						for(var d=0; d < domain.length; d++){
							if(li.includes(domain[d])){
								el.target = "_blank";
								if( !wpsafelink.includes("?") ) {
									el.href = wpsafelink + btoa(el.href) + "?redir=" + btoa(redirUrl);
								} else {
									el.href = wpsafelink + btoa(el.href) + "&redir=" + btoa(redirUrl);
								}
							}
						}
					}
				}