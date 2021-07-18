            var row;

            for( i = 0; i < data.row.length; i++ ) {

                row = $("<tr></tr>");
                $(row).on("dblclick", function(){
                    $( this ).children().each( function( index ){
                        console.log( $(this).text() );
                    });

                });

                // 一括実行 : オブジェクトの内容を順次取得 ( ソースが短い )
                $.each( data.row[i], function(prop, value){
                    $("<td></td>")
                        .text(value)
                        .appendTo(row)
                    ;
                });

                row.appendTo( $("#tbl") );

            }
