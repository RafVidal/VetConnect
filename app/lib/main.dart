import 'package:flutter/material.dart';
import 'package:vetconnect/views/Inicial/tela_inicial.dart';
import 'package:flutter_dotenv/flutter_dotenv.dart';

void main() async {
  runApp(MyApp());
}

class MyApp extends StatelessWidget {
  // This widget is the root of your application.

  @override
  Widget build(BuildContext context) {
    return MaterialApp(
      title: 'VetConnect',
      theme: ThemeData(),
      home: TelaInicial(),
    );
  }
}
