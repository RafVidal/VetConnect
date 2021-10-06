import 'package:flutter/material.dart';
import 'package:vetconnect/views/Cadastro_cliente/tela_cadastro_cliente.dart';
import 'package:vetconnect/views/Login/componentes/background.dart';

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
          Text(
            "TELA DE LOGIN",
            style: TextStyle(fontWeight: FontWeight.bold),
          ),
          SizedBox(height: size.height * 0.20),
          Container(
            child: TextField(
              decoration: InputDecoration(
                icon: Icon(Icons.person),
                hintText: "Email",
                border: InputBorder.none,
              ),
            ),
            margin: EdgeInsets.symmetric(vertical: 10),
            padding: EdgeInsets.symmetric(horizontal: 20, vertical: 5),
            width: size.width * 0.9,
            decoration: BoxDecoration(
              color: Colors.blue[50],
              borderRadius: BorderRadius.circular(29),
            ),
          ),
          SizedBox(height: size.height * 0.02),
          Container(
            child: TextField(
              obscureText: true,
              decoration: InputDecoration(
                icon: Icon(
                  Icons.lock,
                ),
                suffixIcon: Icon(
                  Icons.visibility,
                ),
                hintText: "Senha",
                border: InputBorder.none,
              ),
            ),
            margin: EdgeInsets.symmetric(vertical: 10),
            padding: EdgeInsets.symmetric(horizontal: 20, vertical: 5),
            width: size.width * 0.9,
            decoration: BoxDecoration(
              color: Colors.blue[50],
              borderRadius: BorderRadius.circular(29),
            ),
          ),
          SizedBox(height: size.height * 0.13),
          Container(
            width: size.width * 0.7,
            child: ClipRRect(
              borderRadius: BorderRadius.circular(29),
              child: FlatButton(
                padding: EdgeInsets.symmetric(vertical: 20, horizontal: 40),
                color: Colors.indigo[800],
                onPressed: () {},
                child: Text(
                  "LOGIN",
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
