import 'package:flutter/material.dart';
import 'package:vetconnect/views/Cadastro_Localizacao/componentes/bakground.dart';
import 'package:vetconnect/views/Cadastro_Pet/tela_cadastro_pet.dart';

class Body extends StatelessWidget {
  @override
  Widget build(BuildContext context) {
    Size size = MediaQuery.of(context).size;
    return Background(
      child: Column(
        mainAxisAlignment: MainAxisAlignment.center,
        children: <Widget>[
          Text(
            "LOCALIZAÇÃO",
            style: TextStyle(fontWeight: FontWeight.bold),
          ),
          SizedBox(height: size.height * 0.03),
          Container(
            child: TextField(
              decoration: InputDecoration(
                hintText: "Estado",
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
          Container(
            child: TextField(
              decoration: InputDecoration(
                hintText: "CEP",
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
          Container(
            child: TextField(
              decoration: InputDecoration(
                hintText: "Cidade",
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
          Container(
            child: TextField(
              decoration: InputDecoration(
                hintText: "Bairro",
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
          Container(
            child: TextField(
              decoration: InputDecoration(
                hintText: "Rua",
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
            width: size.width * 0.7,
            child: ClipRRect(
              borderRadius: BorderRadius.circular(29),
              child: FlatButton(
                padding: EdgeInsets.symmetric(vertical: 20, horizontal: 40),
                color: Colors.indigo[800],
                onPressed: () {
                  Navigator.push(
                    context,
                    MaterialPageRoute(
                      builder: (context) {
                        return TelaCadastroPet();
                      },
                    ),
                  );
                },
                child: Text(
                  "PRÓXIMA ETAPA",
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
