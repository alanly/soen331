package assignment2;

public interface IBinTree {

	public IBinTree getLeft();
	public IBinTree getRight();
	public void setLeft(IBinTree bt);
	public void setRight(IBinTree bt);
	public boolean hasLeft();
	public boolean hasRight();
	public int sumNodes();
	public int height();
	public boolean isTwoOrNoLeaf();
	
}
