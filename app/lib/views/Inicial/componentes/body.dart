import 'package:flutter/material.dart';
import 'package:vetconnect/views/Cadastro_Cliente/tela_cadastro_cliente.dart';
import 'package:vetconnect/views/Login/tela_login.dart';
import 'package:vetconnect/views/Inicial/componentes/background.dart';
import 'package:vetconnect/views/Vet-User/tela_vet_user.dart';

class Body extends StatelessWidget {
  @override
  Widget build(BuildContext context) {
    Size size = MediaQuery.of(context).size;
    //Altura e largura total de nosa tela
    return Background(
      child: SingleChildScrollView(
        child: Column(
          mainAxisAlignment: MainAxisAlignment.center,
          children: <Widget>[
            Image.asset(
              "assets/imagens/vac_icon.png",
              height: size.height * 0.3,
            ),
            SizedBox(height: size.height * 0.09),
            Text(
              "SEJA BEM VINDO AO NOSSO SISTEMA \n\n"
              "     DE VACINAÇÃO DOS SEUS PETS!",
              style: TextStyle(fontWeight: FontWeight.bold),
            ),
            SizedBox(height: size.height * 0.09),
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
                        return TelaLogin();
                      },
                    ));
                  },
                  child: Text(
                    "LOGIN",
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
                        return TelaVet_User();
                      },
                    ));
                  },
                  child: Text(
                    "CADASTRO",
                    style: TextStyle(color: Colors.white),
                  ),
                ),
              ),
            ),
          ],
        ),
      ),
    );
  }
}
