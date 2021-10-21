import 'package:flutter/material.dart';
import 'package:vetconnect/views/Localizacao/localizacao.dart';
import 'package:vetconnect/views/Perfil/perfil.dart';
import 'package:vetconnect/views/Pets/pets.dart';

class Body extends StatefulWidget {
  @override
  _BodyState createState() => _BodyState();
}

class _BodyState extends State<Body> {
  int _currentIndex = 0;

  final tabs = [
    Pets(),
    Localizacao(),
    Perfil(),
  ];

  @override
  Widget build(BuildContext context) {
    return Scaffold(
      appBar: AppBar(
        title: Text('VetConnect'),
        backgroundColor: Colors.indigo[800],
        centerTitle: true,
      ),
      body: tabs[_currentIndex],
      bottomNavigationBar: BottomNavigationBar(
        currentIndex: _currentIndex,
        type: BottomNavigationBarType.fixed,
        backgroundColor: Colors.white,
        iconSize: 30,
        selectedFontSize: 16,
        items: [
          BottomNavigationBarItem(
            icon: Icon(Icons.pets),
            title: Text('Pet`s'),
          ),
          BottomNavigationBarItem(
            icon: Icon(Icons.map_outlined),
            title: Text('Localização'),
          ),
          BottomNavigationBarItem(
            icon: Icon(Icons.person_outline),
            title: Text('Perfil'),
          ),
        ],
        onTap: (index) {
          setState(() {
            _currentIndex = index;
          });
        },
      ),
    );
  }
}
