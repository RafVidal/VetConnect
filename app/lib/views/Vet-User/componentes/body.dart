import 'package:flutter/material.dart';
import 'package:vetconnect/views/Cadastro_Cliente/tela_cadastro_cliente.dart';
import 'package:vetconnect/views/Cadastro_Vet/tela_cadastro_vet.dart';
import 'package:vetconnect/views/Inicial/componentes/background.dart';
import 'package:vetconnect/views/Inicial/tela_inicial.dart';
import 'package:vetconnect/views/Login/tela_login.dart';

class Body extends StatelessWidget {
  const Body({
    Key? key,
  }) : super(key: key);

  @override
  Widget build(BuildContext context) {
    Size size = MediaQuery.of(context).size;
    return Background(
      child: Column(
        mainAxisAlignment: MainAxisAlignment.center,
        children: <Widget>[
          Container(
            width: size.width * 0.7,
            child: ClipRRect(
              borderRadius: BorderRadius.circular(29),
              child: FlatButton(
                padding: EdgeInsets.symmetric(vertical: 20, horizontal: 40),
                color: Colors.indigo[800],
                onPressed: () {
                  Navigator.push(context, MaterialPageRoute(
                    builder: (context) {
                      return TelaCadastroCliente();
                    },
                  ));
                },
                child: Text(
                  "SOU UM CLIENTE",
                  style: TextStyle(color: Colors.white),
                ),
              ),
            ),
          ),
          SizedBox(height: size.height * 0.02),
          Container(
            width: size.width * 0.7,
            child: ClipRRect(
              borderRadius: BorderRadius.circular(29),
              child: FlatButton(
                padding: EdgeInsets.symmetric(vertical: 20, horizontal: 40),
                color: Colors.indigo[800],
                onPressed: () {
                  Navigator.push(context, MaterialPageRoute(
                    builder: (context) {
                      return TelaCadastroVet();
                    },
                  ));
                },
                child: Text(
                  "SOU UM VETERINÁRIO",
                  style: TextStyle(color: Colors.white),
                ),
              ),
            ),
          ),
        ],
      ),
    );
  }
}
