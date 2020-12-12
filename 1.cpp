#include<iostream>
using namespace std;
void hitungDenda(int lamaPinjam)
{
	int batasLamaPinjam = 10;
	int dendaHari = lamaPinjam-batasLamaPinjam;
	int dendaPelajaran = 1000*dendaHari;
	int dendaNovel = 2000*dendaHari;
	int dendaCerpen = 1500*dendaHari;
		
	if(dendaPelajaran <= 0)
	{
		dendaPelajaran = 0;
	}
	if(dendaNovel <= 0)
	{
		dendaNovel = 0;
	}
	if(dendaCerpen <= 0)
	{
		dendaCerpen = 0;
	}
	if(dendaHari <= 0)
	{
		dendaHari = 0;
	}
	int totalDenda = dendaPelajaran+dendaCerpen+dendaNovel;
		
	cout<<"Meminjam Selama : "<< lamaPinjam <<" Hari"<<endl;
	cout<<"Telat Mengembalikan : "<<dendaHari<<" Hari"<<endl;
	cout<<"Denda buku mata pelajaran : Rp. "<<dendaPelajaran<<endl;
	cout<<"Denda Novel : Rp. "<<dendaNovel<<endl;
	cout<<"Denda Cerpen : Rp. "<<dendaCerpen<<endl;
	cout<<"Total : Rp. "<<totalDenda;
	
	
}
int main()
{
	int lamaPinjam;
	cout<<"Masukkan Lama Pinjam : ";
	cin>>lamaPinjam;
	
	hitungDenda(lamaPinjam);
}
